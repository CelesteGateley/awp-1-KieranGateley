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
            'password' => Hash::make('root')
        ]);

        $root_user->save();
    }

}
