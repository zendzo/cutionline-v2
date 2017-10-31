<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\CutiType;

class CutiTypesTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Type = ['Tahunan','Melahirakan','Umroh - Haji','Nikah'];

        foreach ($Type as $item) {

        	$CutiType = new CutiType;

        	Model::unguard();

        	$CutiType->type = $item;

        	$CutiType->save();
        }
    }
}
