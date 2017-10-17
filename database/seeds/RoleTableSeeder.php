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
        $admin = new Role;

        $admin->name = 'Administrator';
        $admin->save();

        $user = new Role;

        $user->name = 'User';
        $user->save();
    }
}
