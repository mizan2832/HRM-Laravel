<?php


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
         $this->call(RoleInfoSeeder::class);
         $this->call(UserInfoSeeder::class);
         $this->call(EmployeeSeeder::class);
         $this->call(TestEmployeeSeeder::class);
    }
}
