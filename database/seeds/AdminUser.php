<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Profile;
class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'customer',
        	'description' => 'Customer Role'
        ]);

        $role = Role::create([
        	'name' => 'admin',
        	'description' => 'Admin Role'
        ]);

        $user = User::create([
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456'),
        	'role_id' => $role->id,
        ]);

        Profile::create([
        	'user_id' => $user->id,
        ]);

    }
}
