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
//        DB::table('users') -> truncate();
//        App\User::create([
//            'name' => 'Panpan',
//            'email' => 'congchuamoiyeu88@gmail.com',
//            'password' => bcrypt (12345678)
//        ]);
//        {
//            DB::table('users') -> truncate();
//            App\User::create([
//                'name' => 'Huong',
//                'email' => 'huongnguyen@gmail.com',
//                'password' => bcrypt (123456789)
//            ]);
//        }
        for ($i = 0; $i < 2; $i++) {
            DB::table('users')->insert([
                'name' => 'Huong2' . str_random(10),
                'email' => 'Huong' . str_random(10) . '@gmail.com',
                'password' => bcrypt('123456789'),
                'level' => '1',
            ]);
        }
    }
}
