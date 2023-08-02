<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        for($i=0; $i<=20; $i++){
            DB::table('testEmployees')->insert(
                [
                    "name" => $faker->name(),
                    "email"=> $faker->email(),
                    "designation"=> $faker->randomElement(["op", "admin","manager"]),
                    "salary"=> $faker->randomElement([1000,5000,11111,450000,52465])

                ]
            );

        }

    }
}
