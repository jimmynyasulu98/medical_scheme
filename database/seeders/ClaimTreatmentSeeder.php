<?php

namespace Database\Seeders;

use App\Models\ClaimTreatment;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClaimTreatmentSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        //
        $this->disableForeignKey(); # disable foregn key checks for truncating
        $this->truncate('claim_treatments'); # disable repeated migrations during every seeding
        ClaimTreatment::factory(200)->create();
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
