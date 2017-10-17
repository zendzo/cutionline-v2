<?php

use Illuminate\Database\Seeder;
use App\UserProfile;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UserProfile = new UserProfile;

        $UserProfile->create([
        	'alamat' => 'Jln. Engku Putri, Tanjungpinang',
			'kcp' => 'Tanjungpinang Kota',
			'pendidikan' => 'S1 Manajemen',
			'user_id' => 1
        ]);
    }
}
