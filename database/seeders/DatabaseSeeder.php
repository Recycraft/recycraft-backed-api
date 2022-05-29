<?php

namespace Database\Seeders;

use App\Enums\UserLevel;
use App\Models\ScrapCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => "Raphael Adhimas A. S.",
        //     'username' => 'admin',
        //     'email' => 'testadmin@gmail.com',
        //     'level' => UserLevel::Admin,
        //     'password' => Hash::make('12345678'),
        // ]);

        // ScrapCategory::create([
        //     'name' => 'Plastic'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Paper'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Cardboard'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Styrofoam'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Bottle'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Can'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Spoon Plastic'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Stick'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Straw'
        // ]);
        // ScrapCategory::create([
        //     'name' => 'Plastic Cup'
        // ]);
    }
}
