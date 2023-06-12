<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // schema::disableForeignKeyConstraints();
        // ClassRoom::truncate();
        // schema::enableForeignKeyConstraints();
        
        Student::factory()->count(20)->create();
    }
}
