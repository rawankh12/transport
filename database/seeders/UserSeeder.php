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
            'phone'=> '12345678'

        ]);


    }
}
