<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        // List of Permissions
        Permission::create(['name' => 'create mail']);
        Permission::create(['name' => 'read mail']);
        Permission::create(['name' => 'update mail']);
        Permission::create(['name' => 'delete mail']);
        Permission::create(['name' => 'search mail']);
        Permission::create(['name' => 'upload mail']);

        // Super Admin
        $role = Role::create(['name' => 'Super Admin']);
        $user = User::create([
            'name'      => env('SUPER_ADMIN_NAME', 'Super Admin'),
            'email'     => env('SUPER_ADMIN_EMAIL', 'admin@e-archives.test'),
            'password'  => Hash::make(env('SUPER_ADMIN_PASSWORD', 'Admin123!'))
        ]);
        $user->assignRole($role);

        // Kepala Badan
        $role = Role::create(['name' => 'Head of Agency']);
        $role->givePermissionTo('read mail');
        $role->givePermissionTo('search mail');
        $user = User::create([
            'name'      => 'Head of Agency ',
            'email'     => 'head@e-archives.test',
            'password'  => Hash::make('Head123!')
        ]);
        $user->assignRole($role);

        // Sekertaris
        $role = Role::create(['name' => 'Secretary']);
        $role->givePermissionTo('create mail');
        $role->givePermissionTo('read mail');
        $role->givePermissionTo('update mail');
        $role->givePermissionTo('delete mail');
        $role->givePermissionTo('search mail');
        $role->givePermissionTo('upload mail');
        $user = User::create([
            'name'      => 'Secretary ',
            'email'     => 'secretary@e-archives.test',
            'password'  => Hash::make('Secretary123!')
        ]);
        $user->assignRole($role);
    }
}
