<?php

namespace Database\Seeders;

use App\Models\Dependant;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DependantSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKey(); # disable foregn key checks for truncating
        $this->truncate('dependants'); # disable repeated migrations during every seeding
        Dependant::create([
            'principal_member_id' => 1, 
            'dependant_id' => 4
        ]);
        Dependant::create([
            'principal_member_id' => 1, 
            'dependant_id' => 5
              
        ]);
        Dependant::create([
            'principal_member_id' => 1, 
            'dependant_id' => 6
            
        ]);
        Dependant::create([
            'principal_member_id' => 2, 
            'dependant_id' => 7
         
        ]);
        Dependant::create([
            'principal_member_id' => 2, 
            'dependant_id' => 8
       
        ]);
        Dependant::create([
            'principal_member_id' => 2, 
            'dependant_id' => 9
        ]);
        Dependant::create([
           'principal_member_id' => 2, 
            'dependant_id' => 10
        ]);
        $this->enableForeignKey(); # reanable foregn key checks

    }
}
