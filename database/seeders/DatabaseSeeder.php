<?php

namespace Database\Seeders;

use App\Models\Feeling;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $this->call([
            FeelingSeeder::class,
        ]);
    }
}
