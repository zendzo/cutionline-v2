<?php

use Illuminate\Database\Seeder;
use App\cuti_status;

class cutiStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $status = ['proses','disetujui','ditolak'];

        foreach ($status as $item) {

        	$cuti_status = new cuti_status;
        	
        	$cuti_status->status = $item;

        	$cuti_status->save();
        }
    }
}
