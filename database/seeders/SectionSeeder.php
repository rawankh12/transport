<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create(['name'=>'لاذقية' , 'id'=> 1]);
        Address::create(['name'=>'الشام' , 'id'=> 2]);
        Address::create(['name'=>'سويداء' , 'id'=> 3]);
        Address::create(['name'=>'طرطوس' , 'id'=> 4]);
    }
}
