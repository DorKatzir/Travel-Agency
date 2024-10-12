<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([AdminSeeder::class, WelcomeItemSeeder::class, CounterItemSeeder::class, HomeItemSeeder::class, AboutItemSeeder::class, ContactItemSeeder::class, PrivacyTermSeeder::class, SettingSeeder::class]);

        $this->call([SettingSeeder::class]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
