<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use TruncateTable, DisableForeignKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKey(); # disable foregn key checks for truncating
        $this->truncate('users'); # disable repeated migrations during every seeding
        User::factory(20)->create();
        $this->enableForeignKey(); # reanable foregn key checks
    }
}
