<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name'=>'admin','email'=>'admin@gmail.com', 'password'=>Hash::make('password')],
            ['name'=>'sopheap','email'=>'sopheap@gmail.com', 'password'=>Hash::make('password')],
            ['name'=>'chaty','email'=>'chaty@gmail.com', 'password'=>Hash::make('password')],
            ['name'=>'borith','email'=>'borith@gmail.com', 'password'=>Hash::make('password')],
            ['name'=>'lysa','email'=>'lysa@gmail.com', 'password'=>Hash::make('password')],
            ['name'=>'rotha','email'=>'rotha@gmail.com', 'password'=>Hash::make('password')],
        ];
        //
        User::insert($users);
        DB::table('users')->insert($users);
    }
}
