<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::create([

            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password'=> bcrypt('password'),
            'role_id'=> 1,
            'phone'=> '12345678',
            'id' => 1

        ]);
        User::create([

            'name' => 'Admin1',
            'email' => 'Admin1@gmail.com',
            'password'=> bcrypt('password1'),
            'role_id'=> 2,
            'phone'=> '123456781',
            'id' => 2

        ]);
        User::create([

            'name' => 'Admin2',
            'email' => 'Admin2@gmail.com',
            'password'=> bcrypt('password2'),
            'role_id'=> 2,
            'phone'=> '123456782',
            'id' => 3

        ]);
        User::create([

            'name' => 'Admin3',
            'email' => 'Admin3@gmail.com',
            'password'=> bcrypt('password3'),
            'role_id'=> 2,
            'phone'=> '123456783',
            'id' => 4

        ]);
        User::create([

            'name' => 'Admin4',
            'email' => 'Admin4@gmail.com',
            'password'=> bcrypt('password4'),
            'role_id'=> 2,
            'phone'=> '123456784',
            'id' => 5

        ]);
    }
}