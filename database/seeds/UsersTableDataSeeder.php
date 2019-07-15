<?php

use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 2; $i++) {
            DB::table('users')->insert([
                'name' => 'Huong2'.str_random(10),
                'email' => 'Huong'.str_random(10).'@gmail.com',
                'password' => bcrypt('123456789'),
                'level' => '1',
            ]);
        }
    }
}
