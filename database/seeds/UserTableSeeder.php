<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_regular_user = Role::where('name', 'common')->first();
	    $role_admin  = Role::where('name', 'admin')->first();

	    $user = User::where('email', 'user@autogestor.com')->first();
	    if (!$user)
	    {
		    $user = new User();
		    $user->name = 'User';
		    $user->email = 'user@autogestor.com';
		    $user->password = bcrypt('user');
		    $user->save();
		    $user->roles()->attach($role_regular_user);	    	
	    }

		$admin = User::where('email', 'admin@autogestor.com')->first();
		if (!$admin)
		{		
		    $admin = new User();
		    $admin->name = 'Admin';
		    $admin->email = 'admin@autogestor.com';
		    $admin->password = bcrypt('admin');
		    $admin->save();
		    $admin->roles()->attach($role_admin);
		}
    }
}
