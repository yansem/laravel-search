<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(150000)->create();

        User::factory()->create([
            'first_name' => 'Erland',
            'last_name' => 'Muchasaj',
            'company' => 'EMCMS Corporation',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'first_name' => 'Erland',
            'last_name' => 'Muchasaj',
            'company' => 'EMCMS Group',
            'email' => 'test@emcms.com',
        ]);

        User::factory()->create([
            'first_name' => 'Erland',
            'last_name' => 'Doe',
            'company' => 'EMCMS LTD',
            'email' => 'info@doe.com',
        ]);

        User::factory()->create([
            'first_name' => 'Erland',
            'last_name' => 'Doe',
            'company' => 'EMCMS Corporation',
            'email' => 'info@erland.com',
        ]);

        User::factory()->create([
            'first_name' => 'john',
            'last_name' => 'Muchasaj',
            'company' => 'Pimlico LTD',
            'email' => 'info@miltons.com',
        ]);

        User::factory()->create([
            'first_name' => 'john',
            'last_name' => 'Doe',
            'company' => 'Pimlico LTD',
            'email' => 'info@mjohn.com',
        ]);

        User::factory()->create([
            'first_name' => 'Bill',
            'last_name' => 'Gates',
            'company' => 'Microsoft Corporation',
            'email' => 'bill.gates@microsoft.com',
        ]);

        User::factory()->create([
            'first_name' => 'Tim',
            'last_name' => 'O\'Reilly',
            'company' => 'O\'Reilly Media Inc.',
            'email' => 'tim@oreilly.com',
        ]);
    }
}
