<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->static_data();
        $this->call(UsersTableSeeder::class);
    }

    private function static_data() {
        $this->roles();
        $root_user = User::create([
            'name' => 'Root Admin',
            'email' => 'root@localhost',
            'email_verified_at' => now(),
            'password' => Hash::make('root_admin_password')
        ]);

        $root_user->save();
        $root_user->assignRole('root');
    }

    private function roles() {
        $root_role = Role::create(['name' => 'root',]);
        $manage_post_permission = Permission::create(['name' => 'manage_posts',]);
        $manage_user_permission = Permission::create(['name' => 'manage_users',]);
        $root_role->givePermissionTo($manage_post_permission);
        $root_role->givePermissionTo($manage_user_permission);
    }
}
