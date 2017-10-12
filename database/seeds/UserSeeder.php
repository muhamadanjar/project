<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::insert([
            ['name' => 'admin'],
            ['name' => 'user'],
            ['name' => 'surveyor'],
        ]);
    
        // Basic permissions data
        App\Permission::insert([
            ['name' => 'access.backend'],
            ['name' => 'create.user'],
            ['name' => 'edit.user'],
            ['name' => 'delete.user'],

            ['name' => 'create.dokumen'],
            ['name' => 'edit.dokumen'],
            ['name' => 'delete.dokumen'],

        ]);
    
        // Add a permission to a role
        $role = App\Role::where('name', 'admin')->first();
        $role->addPermission('access.backend');
        $role->addPermission('create.user');
        $role->addPermission('edit.user');    
        $role->addPermission('delete.user');

        $role->addPermission('create.dokumen');
        $role->addPermission('edit.dokumen');
        $role->addPermission('delete.dokumen');
        $role->addPermission('create.tanah');
        $role->addPermission('edit.tanah');
        $role->addPermission('delete.tanah');
        $role->addPermission('create.bangunan');
        $role->addPermission('edit.bangunan');
        $role->addPermission('delete.bangunan');

        $role->addPermission('create.global');
        $role->addPermission('edit.global');
        $role->addPermission('delete.global');
        // ... Add other role permission if necessary
    
        // Create a user, and give roles
        $user = App\User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'name' => 'Admin Aja',
            'password' => bcrypt('password'),
            'isactived' => 1,
            
        ]);
    
        $user->assignRole('admin');
    }
}
