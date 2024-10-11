<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a Faker instance
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            DB::table('companies')->insert([
                'name' => $faker->company,
                'logo' => 'logos/default.png', 
                'email' => $faker->unique()->companyEmail,
                'website' => $faker->url,
            ]);
        }
    }
}
