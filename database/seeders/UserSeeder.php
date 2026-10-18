<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the default login accounts.
     *
     * Admin (developer) has full access to the dashboard + CMS blueprint.
     * Password can be overridden via the PASSWORD env var, defaults to "password".
     */
    public function run(): void
    {
        $password = env('PASSWORD', 'password');
        $now = now()->format('Y-m-d H:i:s');

        User::firstOrCreate(
            ['email' => 'admin@nexera.test'],
            [
                'name' => 'Nexera Admin',
                'role' => RoleEnum::DEVELOPER,
                'password' => bcrypt($password),
                'verified_at' => $now,
                'email_verified_at' => $now,
            ]
        );

        User::firstOrCreate(
            ['email' => 'editor@nexera.test'],
            [
                'name' => 'Nexera Editor',
                'role' => RoleEnum::EDITOR,
                'password' => bcrypt($password),
                'verified_at' => $now,
                'email_verified_at' => $now,
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@nexera.test'],
            [
                'name' => 'Nexera User',
                'role' => RoleEnum::USER,
                'password' => bcrypt($password),
                'verified_at' => $now,
                'email_verified_at' => $now,
            ]
        );
    }
}
