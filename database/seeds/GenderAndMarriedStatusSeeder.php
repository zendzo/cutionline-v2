<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GenderAndMarriedStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$genders = [
        	['gender'	=>	'Laki-Laki'],
        	['gender'	=>	'Perempuan']
        ];

        $married_statuses = [
        	['status'	=>	'Lajang'],
        	['status'	=>	'Menikah']
        ];

        	DB::table('married_statuses')->insert($married_statuses);

        	DB::table('genders')->insert($genders);

        $this->command->info("Successfully Add Status And Gender");
    }
}
