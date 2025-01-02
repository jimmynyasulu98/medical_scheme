<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PgSql\Lob;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();

       /*  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ServiceProviderSeeder::class);
        $this->call(CoverSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(ClaimSeeder::class);
        $this->call(ClaimTreatmentSeeder::class);
        $this->call(DependantSeeder::class);

    }
}
