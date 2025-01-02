<?php

namespace Database\Seeders;

use App\Models\User;
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

        $principal_members = User::get()->where('is_principal_member', true)->pluck('id')->toArray();

        $member_dependant = Dependant::pluck('dependant_id')->toArray();

        $dependants = User::get()->where('is_principal_member', false)->whereNotIn('id', $member_dependant)->pluck('id')->toArray();

        foreach ($dependants as $dependant) {

             Dependant::create([
            'principal_member_id' => $principal_members[array_rand($principal_members)],
            'dependant_id' => $dependant
         
        ]);
        }
       
        $this->enableForeignKey(); # reanable foregn key checks

    }
}
