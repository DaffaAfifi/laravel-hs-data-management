<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        schema::disableForeignKeyConstraints();
        Role::truncate();
        schema::enableForeignKeyConstraints();

        $roleData =[
            ['name' => 'Teacher'],
            ['name' => 'Admin'],
            ['name' => 'Student']
        ];

        foreach($roleData as $value){
            Role::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } 
    }
}
