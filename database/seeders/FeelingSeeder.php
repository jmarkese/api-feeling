<?php

namespace Database\Seeders;

use App\Models\Feeling;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeelingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->map(function ($user) {
            Feeling::factory(rand(5,30))->create(['user_id' => $user->id]);
        });
    }
}
