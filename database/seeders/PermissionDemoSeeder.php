<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\InstanceController;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'rooms.create']);
        Permission::create(['name' => 'rooms.edit']);
        Permission::create(['name' => 'rooms.delete']);
        Permission::create(['name' => 'rooms.update']);
        Permission::create(['name' => 'instances.create']);
        Permission::create(['name' => 'instances.edit']);
        Permission::create(['name' => 'instances.delete']);
        Permission::create(['name' => 'instances.update']);
        Permission::create(['name' => 'bookings.create']);
        Permission::create(['name' => 'bookings.edit']);
        Permission::create(['name' => 'bookings.delete']);
        Permission::create(['name' => 'bookings.update']);


        //create roles and assign existing permissions
        $guestRole = Role::create(['name' => 'guest']);
        $guestRole->givePermissionTo('bookings.create');
        $guestRole->givePermissionTo('bookings.edit');
        $guestRole->givePermissionTo('bookings.delete');
        $guestRole->givePermissionTo('bookings.update');

        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'Example guest',
            'email' => 'guest@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($guestRole);

        $user = User::factory()->create([
            'name' => 'Super admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($superadminRole);
    }
}