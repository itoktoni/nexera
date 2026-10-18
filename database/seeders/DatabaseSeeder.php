<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Order matters: login users first, then admin menus,
     * then the CMS module content (homepage, blueprint, frontend menus).
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MenuSeeder::class,
            \Modules\Cms\Database\Seeders\CmsDatabaseSeeder::class,
        ]);
    }
}
