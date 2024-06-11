<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CustomerSeeder::class);

        \App\Models\OrderStatus::create([
            'name' => 'Pending',
        ]);

        \App\Models\OrderStatus::create([
            'name' => 'Processing',
        ]);

        \App\Models\OrderStatus::create([
            'name' => 'Shipped',
        ]);

        \DB::unprepared(file_get_contents(database_path('seeders/indonesia.sql')));
    }
}
