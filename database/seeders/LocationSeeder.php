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
            'short_name' => 'UNIMA', 
            'full_name' => 'University of Malawi'
        ]);
        Location::create([
          
            'short_name' => 'LUANAR BUNDA', 
            'full_name' => 'Malawi University of Agriculture and Natural Resources-Bunda'
              
        ]);
        Location::create([
            'short_name' => 'LUANAR NRC', 
            'full_name' => 'Lilongwe University of Agriculture and Natural Resources-NRC'
            
        ]);
        Location::create([
            'short_name' => 'MUBAS', 
            'full_name' => 'Malawi University of Business and Applied Sciences'
         
        ]);
        Location::create([
            'short_name' => 'KUHES', 
            'full_name' => 'Kamuzu University Of Healthy Sciences'
       
        ]);
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
