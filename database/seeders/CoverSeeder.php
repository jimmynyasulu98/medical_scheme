<?php

namespace Database\Seeders;

use App\Models\Cover;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoverSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKey(); # disable foregn key checks for truncating
        $this->truncate('covers'); # disable repeated migrations during every seeding
        Cover::create([
            'title' => 'STUDENT', 
        ]);
        Cover::create([
            'title' => 'COMPREHENSIVE',
              
        ]);
        Cover::create([
            'title' =>   'STANDARD',
            
        ]);
        Cover::create([
            'title' => 'ZIKOMO',
         
        ]);
        Cover::create([
            'title' => 'ABALE',
       
        ]);
        Cover::create([
            'title' =>   'COMPREHENSIVE-EX',
        ]);
        Cover::create([
            'title' =>  'STANDARD-EX'
        ]);
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
