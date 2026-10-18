<?php

use App\Models\ContactMessage;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    // Testing DB is migrated fresh & empty (RefreshDatabase) — seed it.
    $this->seed(DatabaseSeeder::class);
});

it('submits contact form and lists the message in admin inbox', function () {
    $response = $this->withSession(['captcha_testkey123' => 42])->post(route('contact.post'), [
        'name' => 'Budi Santoso',
        'email' => 'budi@perusahaan.com',
        'subject' => 'Solusi & Sistem RFID',
        'message' => "Butuh RFID gate untuk warehouse.\n\nTelepon: 0812000111",
        'captcha' => 42,
        'captcha_key' => 'testkey123',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('contact_messages', [
        'email' => 'budi@perusahaan.com',
        'subject' => 'Solusi & Sistem RFID',
    ]);

    $admin = User::where('email', 'admin@nexera.test')->first();
    $inbox = $this->actingAs($admin)->get(route('contact-message.getTable'));

    $inbox->assertStatus(200);
    $inbox->assertSee('Budi Santoso');
    $inbox->assertSee('budi@perusahaan.com');

    ContactMessage::where('email', 'budi@perusahaan.com')->delete();
});

it('renders blog index, blog post, and static pages', function () {
    $this->get(route('blog'))->assertStatus(200)->assertSee('Artikel');
    $this->get(route('blog.post', 'mengenal-rfid-uhf-warehouse'))->assertStatus(200);
    $this->get(route('page', 'tentang-kami'))->assertStatus(200)->assertSee('Nexera');
    $this->get(route('page', 'layanan'))->assertStatus(200)->assertSee('Devices');
    $this->get(route('page', 'produk'))->assertStatus(200)->assertSee('RFID Systems');
});
