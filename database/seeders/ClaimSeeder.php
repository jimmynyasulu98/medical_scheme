<?php

namespace Database\Seeders;

use App\Models\Claim;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClaimSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //
         $this->disableForeignKey(); # disable foregn key checks for truncating
         $this->truncate('claims'); # disable repeated migrations during every seeding
         Claim::factory(80)->create();
         $this->enableForeignKey(); # reanable foregn key checks
    }
}
