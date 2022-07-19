<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\MealController;
use App\Http\Controllers\Backend\DrinkController;
use Auth;

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

        Permission::create(['name' => 'rooms.edit']);
        Permission::create(['name' => 'rooms.delete']);
        Permission::create(['name' => 'rooms.update']);
        Permission::create(['name' => 'units.create']);
        Permission::create(['name' => 'units.edit']);
        Permission::create(['name' => 'units.delete']);
        Permission::create(['name' => 'units.update']);
        Permission::create(['name' => 'bookings.create']);
        Permission::create(['name' => 'bookings.edit']);
        Permission::create(['name' => 'bookings.delete']);
        Permission::create(['name' => 'bookings.update']);
        Permission::create(['name' => 'meals.update']);
        Permission::create(['name' => 'meals.create']);
        Permission::create(['name' => 'meals.edit']);
        Permission::create(['name' => 'meals.delete']);
        Permission::create(['name' => 'drinks.update']);
        Permission::create(['name' => 'drinks.create']);
        Permission::create(['name' => 'drinks.sdelete']);
        Permission::create(['name' => 'drinks.edit']);


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
            'name' => 'Ardhi',
            'email' => 'ardhi.kholifatul8@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '081225755325',
            'status_verified' => '1',
            'role' => 'guest'
        ]);
        $user->assignRole($guestRole);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '089658662848',
            'status_verified' => '1',
            'role' => 'super_admin'
        ]);
        $user->assignRole($superadminRole);
    }
}
