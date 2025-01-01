<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKey(); # disable foregn key checks for truncating
        $this->truncate('locations'); # disable repeated migrations during every seeding
        Location::create([
            'title' => 'UNIMA', 
        ]);
        Location::create([
            'title' => 'LUANAR BUNDA',
              
        ]);
        Location::create([
            'title' =>   'LUANAR NRC',
            
        ]);
        Location::create([
            'title' => 'MUBAS',
         
        ]);
        Location::create([
            'title' => 'KUHES',
       
        ]);
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
