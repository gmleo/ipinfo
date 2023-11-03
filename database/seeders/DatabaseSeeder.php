<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create roles and permisions
        $role = Role::create(['name' => 'Admin']);
        Permission::create(['name' => 'List History']);
        Permission::create(['name' => 'View History']);

        $role->givePermissionTo('List History');
        $role->givePermissionTo('View History');

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($role);

        $this->call([
            UserSeeder::class,
            HistorySeeder::class
        ]);
    }
}
