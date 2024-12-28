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
            'full_name' => 'UNIMA', 
        ]);
        Location::create([
            'full_name' => 'LUANAR BUNDA',
              
        ]);
        Location::create([
            'full_name' =>   'LUANAR NRC',
            
        ]);
        Location::create([
            'full_name' => 'MUBAS',
         
        ]);
        Location::create([
            'full_name' => 'KUHES',
       
        ]);
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
