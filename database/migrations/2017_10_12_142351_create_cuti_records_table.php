<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCutiRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuti_type_id');
            $table->integer('user_id');
            $table->date('masa_berlaku');
            $table->date('masa_berakhir');
            $table->integer('sisa')->default(0)->nullable();
            $table->integer('terpakai')->default(0)->nullable();
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuti_records');
    }
}
