<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisherCreate = Permission::create([
            'name' => 'publisher_create',
            'guard_name'=> 'web']);

        $offerView = Permission::create([
            'name' => 'offer_view',
            'guard_name'=> 'web']);

        $ownerRatings = Permission::create([
            'name' => 'owner_ratings',
            'guard_name'=> 'web']);

        $publisher = Role::create([
            'name' =>'Publicador',
            'guard_name' =>'web']);

        $owner = Role::where('name','Propietario')->first();


        $owner->givePermissionTo($offerView);

    }
}
