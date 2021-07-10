<?php

use Illuminate\Database\Seeder;

class RoleInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
                
        ]);
        DB::table('roles')->insert([
            'name' => 'Tuitor',      
        ]);
    }
}
