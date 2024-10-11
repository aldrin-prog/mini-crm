<?php

namespace Database\Seeders;
use App\Models\Company; // Import the Company model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyIds = Company::pluck('id')->toArray();
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $randomCompanyId = $faker->randomElement($companyIds);
            DB::table('employees')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company_id' => $randomCompanyId, // Use the randomly selected company ID
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
