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
            'name' => 'STUDENT', 
        ]);
        Cover::create([
            'name' => 'COMPREHENSIVE',
              
        ]);
        Cover::create([
            'name' =>   'STANDARD',
            
        ]);
        Cover::create([
            'name' => 'ZIKOMO',
         
        ]);
        Cover::create([
            'name' => 'ABALE',
       
        ]);
        Cover::create([
            'name' =>   'COMPREHENSIVE-EX',
        ]);
        Cover::create([
            'name' =>  'STANDARD-EX'
        ]);
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
