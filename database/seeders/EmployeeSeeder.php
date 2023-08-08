<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class EmployeeSeeder extends Seeder
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

            DB::table("employees")->insert([
                "name" => $faker->name(),
                "father_name" => $faker->name(),
                "email" => $faker->email,
                "gender" => $faker->randomElement(["male", "female"]),
                "birth_date" => $faker->date($format = 'Y-m-d', $max = 'now'),
                'phone1'=> $faker->e164PhoneNumber,
                'phone2'=> $faker->e164PhoneNumber,
                'local_address'=> $faker->address,
                'permanent_address'=>$faker->address,
                'nationality'=>$faker->country,
                'reference1'=>'mizan',
                'reference1_phone'=>'01515612832',
                'reference2'=>'mizan',
                'reference2_phone'=>'01515612832',
                'zip_code'=>'880',
                'meritial_status'=>'married',
                'profile_picture'=>'Mizanur Rahman.jpg',
                'resume'=>'Mizanur Rahman.docx',
                'offer'=>'Mizanur Rahman.docx',
                'joining_letter'=>'Mizanur Rahman.docx',
                'other'=>'Mizanur Rahman.docx',
                'employee_id'=>$faker->numberBetween(5,20),
                'department'=>2,
                'joining_date'=>'2021-10-08',
                'status'=>'1',
                'basic'=>'5000',
                'medical_allowance'=>'4000',
                'transport'=>'1000',
                'house_rent'=>'10000',
                'tax'=>'500',
                'absent'=>'500',
                'meal'=>'0',
                'total_salary'=>'19000',
                'holder_name'=>'brack',
                'account_number'=>'144544a',
                'bank_name'=>'asia',
                'branch_name'=>'mirpur',
                'created_at'=>'2021-10-23 16:17:13'

            ]);
    }

    }
}
