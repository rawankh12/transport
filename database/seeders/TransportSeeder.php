<?php

namespace Database\Seeders;

use App\Models\Transporting;
use App\Models\TypeTran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeTran::create(['name'=>'باص' , 'id'=> 1]);
        TypeTran::create(['name'=>'بولمن' , 'id' =>2]);
        TypeTran::create(['name'=>'سرفيس' , 'id' =>3]);
    }
}
