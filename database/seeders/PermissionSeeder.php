<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Controllers\Backend\MealController;
use App\Http\Controllers\Backend\DrinkController;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'meals.update']);
        Permission::create(['name' => 'meals.create']);
        Permission::create(['name' => 'meals.edit']);
        Permission::create(['name' => 'meals.delete']);
        Permission::create(['name' => 'drinks.update']);
        Permission::create(['name' => 'drinks.create']);
        Permission::create(['name' => 'drinks.delete']);
        Permission::create(['name' => 'drinks.edit']);
    }
}
