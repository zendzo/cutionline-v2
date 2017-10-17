<?php

use Illuminate\Database\Seeder;
use App\UserGrade;

class UserGradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name = ['ASSISTANT','ASSISTANT','ASSISTANT','AMGR','AMGR','AMGR','MGR','MGR','MGR','AVP'];

        $level = 4;

        foreach ($name as $item) {

        	$grade = new UserGrade;

        	$G_level = $level++;

        	$grade->grade = $item;

        	$grade->grade_level = $G_level;

        	$grade->save();
        }
    }
}
