<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->disableForeignKey(); # disable foregn key checks for truncating
        $this->truncate('invoices'); # disable repeated migrations during every seeding
        Invoice::factory(20)->create();
        $this->enableForeignKey(); # reanable foregn key checks
      
    }
}
