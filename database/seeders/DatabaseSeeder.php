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

        User::create([
            'name' => "Raphael Adhimas A. S.",
            'username' => 'admin',
            'email' => 'testadmin@gmail.com',
            'level' => UserLevel::Admin,
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => "Wahyu Adi",
            'username' => 'wahyuadi',
            'email' => 'testuser@gmail.com',
            'level' => UserLevel::User,
            'password' => Hash::make('12345678'),
        ]);

        ScrapCategory::create([
            'name' => 'Plastic',
            'slug' => 'plastic',
            'image' => '',
            'desc' => 'blablabla'
        ]);
        ScrapCategory::create([
            'name' => 'Paper',
            'slug' => 'paper',
            'image' => '',
            'desc' => 'blablabla'
        ]);
        ScrapCategory::create([
            'name' => 'Cardboard',
            'slug' => 'cardboard',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
        ScrapCategory::create([
            'name' => 'Styrofoam',
            'slug' => 'styrofoam',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
        ScrapCategory::create([
            'name' => 'Plastic Bottle',
            'slug' => 'bottle-plastic',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
        ScrapCategory::create([
            'name' => 'Can',
            'slug' => 'can',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
        ScrapCategory::create([
            'name' => 'Plastic Spoon',
            'slug' => 'spoon-plastic',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
        ScrapCategory::create([
            'name' => 'Stick',
            'slug' => 'stick',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
        ScrapCategory::create([
            'name' => 'Straw',
            'slug' => 'straw',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
        ScrapCategory::create([
            'name' => 'Plastic Cup',
            'slug' => 'glass-plastic',
            'image' => '',
            'desc' => 'bla bla bla'
        ]);
    }
}
