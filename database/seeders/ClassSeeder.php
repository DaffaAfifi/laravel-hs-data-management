<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassRoom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        schema::enableForeignKeyConstraints();

        $classData =[
            ['name' => 'TIF A'],
            ['name' => 'TIF B'],
            ['name' => 'TIF C'],
            ['name' => 'TIF D'],
            ['name' => 'TIF E']
        ];

        foreach($classData as $value){
            ClassRoom::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } 
    }
}
