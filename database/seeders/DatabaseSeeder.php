<?php



use Illuminate\Database\Seeder;
use Database\Seeders\UserInfoSeeder;
use Database\Seeders\RoleInfoSeeder;

use Database\Seeders\EmployeeSeeder;

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
    }
}
