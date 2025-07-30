<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        Post::factory(100)->create();

        Country::query()->insert([
            [
                'country_name' => 'Bangladesh',
            ],
            [
                'country_name' => 'United States',
            ]
        ]);

        City::query()->insert([
            [
                'city_name' => 'Dhaka',
                'country_id' => 1,
            ],
            [
                'city_name' => 'Rangpur',
                'country_id' => 1,
            ],
            [
                'city_name' => 'New York',
                'country_id' => 2,
            ],
            [
                'city_name' => 'Los Angeles',
                'country_id' => 2,
            ]
        ]);

        State::query()->insert([
            [
                'state_name' => 'Dhanmondi',
                'city_id' => 1,
            ],
            [
                'state_name' => 'Mohakhali',
                'city_id' => 1,
            ],
            [
                'state_name' => 'Uttara',
                'city_id' => 1,
            ],
            [
                'state_name' => 'Rangpur Sadar',
                'city_id' => 2,
            ],
            [
                'state_name' => 'Dinajpur',
                'city_id' => 2,
            ],
            [
                'state_name' => 'Lalmonirhat',
                'city_id' => 2,
            ],
            [
                'state_name' => 'Kings County (Brooklyn)',
                'city_id' => 3,
            ],
            [
                'state_name' => 'Queens County (Queens)',
                'city_id' => 3,
            ],
            [
                'state_name' => 'California',
                'city_id' => 4,
            ]
        ]);
    }
}
