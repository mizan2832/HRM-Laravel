<?php

use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' 	   => 'Mizanur Rahman',
            'username' => 'admin',
            'email'	   => 'admin@gmail.com',
            'role_id'  =>  1,
            'password' =>  bcrypt('12345678'),
            
        ]);
        DB::table('users')->insert([
            'name' 	   => 'Mizanur Rahman',
            'username' => 'Super Admin',
            'role_id'  =>  2,
            'email'	   => 'superadmin@gmail.com',
            'password' =>  bcrypt('12345678'),
            
        ]);
        DB::table('users')->insert([
            'name' 	   => 'Farjana',
            'username' => 'Manager',
            'role_id'  =>  3,
            'email'	   => 'manager@gmail.com',
            'password' =>  bcrypt('12345678'),
            
        ]);
        DB::table('users')->insert([
            'name' 	   => 'Mizan',
            'username' => 'Manager',
            'role_id'  =>  4,
            'email'	   => 'manager@gmail.com',
            'password' =>  bcrypt('12345678'),
            
        ]);
    }
}
