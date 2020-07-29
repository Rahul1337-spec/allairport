<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('rolename','admin')->first();
        $providerRole = Role::where('rolename','provider')->first();
        $userRole = Role::where('rolename','user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $provider = User::create([
            'name' => 'Provider',
            'email' => 'pro@pro.com',
            'password' => Hash::make('password')
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $provider->roles()->attach($providerRole);
        $user->roles()->attach($userRole);

    }
}
