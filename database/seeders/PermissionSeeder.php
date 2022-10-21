<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ownerCreate = Permission::create([
            'name' => 'owner_create',
            'guard_name'=> 'web'
        ]);

        $driverCreate = Permission::create([
            'name' => 'driver_create',
            'guard_name'=> 'web'
        ]);

        $admin = Role::create([
            'name' =>'Administrador',
            'guard_name' =>'web']);
        $owner = Role::create([
            'name' =>'Propietario',
            'guard_name' =>'web']);
        $driver = Role::create([
            'name' =>'Conductor',
            'guard_name' =>'web']);

        $owner->givePermissionTo($ownerCreate);
        $driver->givePermissionTo($driverCreate);


    }
}
