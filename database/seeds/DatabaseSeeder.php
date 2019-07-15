<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableDataSeeder::class);
        DB::table('users')->insert([
            'name' => 'Hoa',
            'email' => 'hoa@gmail.com',
            'password' => bcrypt('1234567890'),
//            'level' => '1'
        ]);
    }
}
