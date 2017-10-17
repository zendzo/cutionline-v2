<?php

use Illuminate\Database\Seeder;

use App\User;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        for ($i=0; $i < 1; $i++) { 
        	$user->first_name = 'admin';
	        $user->last_name = 'system';
	        $user->NPP = '';
	        $user->join_year = '12/09/2012';
            $user->email = 'admin@cutionline.com';
	        $user->phone = '082291322802';
	        $user->photo = 'admin@cutionline.com';
	        $user->password = 'adminadmin';
            $user->role_id = 1;
            $user->user_grade_id = 1;
	        $user->active = true;
	        $user->save();
        }

    }
}
