<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_regular_user = new Role();
	    $role_regular_user->name = 'common';
	    $role_regular_user->description = 'First regular user';
	    $role_regular_user->save();

	    $role_admin = new Role();
	    $role_admin->name = 'admin';
	    $role_admin->description = 'System Admin';
	    $role_admin->save();
    }
}
