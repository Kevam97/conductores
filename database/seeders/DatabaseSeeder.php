<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call(
            PermissionSeeder::class,
            ListSeeder::class
        );

        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
        ]);
        $driver = \App\Models\User::factory()->create([
            'name' => 'Driver',
            'email' => 'driver@example.com',
        ]);
        $owner = \App\Models\User::factory()->create([
            'name' => 'Owner',
            'email' => 'owner@example.com',
        ]);

        $user->assignRole('Administrador');
        $driver->assignRole('Conductor');
        $owner->assignRole('Propietario');
    }
}
