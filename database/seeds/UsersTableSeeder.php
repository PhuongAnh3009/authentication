<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') -> truncate();
        App\User::create([
            'name' => 'Panpan',
            'email' => 'congchuamoiyeu88@gmail.com',
            'password' => bcrypt (12345678)
        ]);
    }
}
