<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Database\Seeders\HomeItemSeeder;
// use Database\Seeders\AboutItemSeeder;
use Database\Seeders\ContactItemSeeder;
// use Database\Seeders\CounterItemSeeder;
//use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //$this->call([AdminSeeder::class]);
        // $this->call([WelcomeItemSeeder::class]);
        // $this->call([CounterItemSeeder::class]);
        // $this->call([HomeItemSeeder::class]);
        // $this->call([AboutItemSeeder::class]);
        $this->call([ContactItemSeeder::class]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
