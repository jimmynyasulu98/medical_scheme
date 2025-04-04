<?php

namespace Database\Seeders;

use App\Models\ServiceProvider;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceProviderSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKey(); # disable foregn key checks for truncating
        $this->truncate('service_providers'); # disable repeated migrations during every seeding
        ServiceProvider::factory(10)->create();
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
