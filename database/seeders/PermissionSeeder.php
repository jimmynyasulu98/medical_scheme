<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
  
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'user-modify',

            'role-create', 'role-list', 'role-edit', 'role-delete',

            'invoice-list', 'invoice-create','invoice-edit','invoice-submit',
            'invoice-approve', 'invoice-delete',

            'claim-list', 'claim-create', 'claim-edit','claim-approve','claim-reject',
            'claim-delete',
            
        ];

        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
