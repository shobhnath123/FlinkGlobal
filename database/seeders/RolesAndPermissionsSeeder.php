<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Sets up all roles (superadmin, admin, Sales Agent, user) with correct permissions.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // -------------------------------------------------------
        // 1. CREATE ALL PERMISSIONS
        // -------------------------------------------------------
        $permissions = [
            // Roles
            'Role access', 'Role create', 'Role edit', 'Role delete',
            // Users
            'User access', 'User create', 'User edit', 'User delete',
            // Permissions
            'Permission access', 'Permission create', 'Permission edit', 'Permission delete',
            // Mail settings
            'Mail access', 'Mail edit',
            // Client Form Requests (Sales Agent feature)
            'ClientForm access', 'ClientForm create', 'ClientForm own-access',
            // Business Applications
            'BusinessApp access', 'BusinessApp own-access', 'BusinessApp delete', 'BusinessApp own-delete',
            // Sales Agents
            'SalesAgent create',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // -------------------------------------------------------
        // 2. CREATE ROLES
        // -------------------------------------------------------
        $superadminRole  = Role::firstOrCreate(['name' => 'superadmin']);
        $adminRole       = Role::firstOrCreate(['name' => 'admin']);
        $salesAgentRole  = Role::firstOrCreate(['name' => 'Sales Agent']);
        $userRole        = Role::firstOrCreate(['name' => 'user']);

        // -------------------------------------------------------
        // 3. ASSIGN PERMISSIONS TO ROLES
        // -------------------------------------------------------

        // superadmin & admin: full access to everything
        $allPermissions = Permission::all();
        $superadminRole->syncPermissions($allPermissions);
        $adminRole->syncPermissions($allPermissions);

        // Sales Agent: No permissions by default, all permissions must be assigned per-user.
        $salesAgentRole->syncPermissions([]);

        // user: basic read-only access (no admin panel access)
        $userRole->syncPermissions([]);

        // -------------------------------------------------------
        // 4. CREATE DEMO USERS (skip if already exist)
        // -------------------------------------------------------

        // --- SuperAdmin ---
        if (!User::where('email', 'superadmin@gmail.com')->exists()) {
            $superAdmin = User::create([
                'name'     => 'SuperAdmin',
                'email'    => 'superadmin@gmail.com',
                'password' => bcrypt('password'),
                'profile'  => 'user.avif',
            ]);
            $superAdmin->assignRole($superadminRole);
        }

        // --- Admin ---
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            $admin = User::create([
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'profile'  => 'user.avif',
            ]);
            $admin->assignRole($adminRole);
        }

        // --- Sales Agent ---
        if (!User::where('email', 'agent@gmail.com')->exists()) {
            $agent = User::create([
                'name'     => 'Sales Agent',
                'email'    => 'agent@gmail.com',
                'password' => bcrypt('password'),
            ]);
            $agent->assignRole($salesAgentRole);
        }

        // --- User ---
        if (!User::where('email', 'user@gmail.com')->exists()) {
            $user = User::create([
                'name'     => 'User',
                'email'    => 'user@gmail.com',
                'password' => bcrypt('password'),
            ]);
            $user->assignRole($userRole);
        }

        $this->command->info('✅ Roles & Permissions seeded successfully!');
        $this->command->table(
            ['Role', 'Permissions'],
            [
                ['superadmin', 'All permissions'],
                ['admin',      'All permissions'],
                ['Sales Agent','ClientForm create, ClientForm own-access, BusinessApp own-access'],
                ['user',       'None (front-end only)'],
            ]
        );
    }
}
