<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Section::create(['admin_id'=>1,'name'=>'لاذقية','time_opened'=>'00:00:00','time_closed'=>'12:00:00', 'id'=> 1]);
        Section::create(['admin_id'=>1,'name'=>'الشام' ,'time_opened'=>'00:00:00','time_closed'=>'12:00:00','id'=> 2]);
        Section::create(['admin_id'=>1,'name'=>'سويداء' ,'time_opened'=>'00:00:00','time_closed'=>'12:00:00','id'=> 3]);
        Section::create(['admin_id'=>1,'name'=>'طرطوس' ,'time_opened'=>'00:00:00','time_closed'=>'12:00:00', 'id'=> 4]);


    }

    // static function sed($name , $opened , $closed , $admin)
    // {

    //     $i = Section::value('id');
    //     if($i >= 0)
    //     $id = 1 + $i  ;
    //     Section::create(['name'=>$name , 'time_opened'=>$opened ,'time_closed'=>$closed ,'admin_id'=>$admin, 'id'=> $id ]);


    // }
}
