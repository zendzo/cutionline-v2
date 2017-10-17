<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuti_type_id');
            $table->date('mulai');
            $table->date('berakhir');
            $table->date('masa_tahun');
            $table->string('keperluan');
            $table->string('alamat');
            $table->text('catatan_umc')->nullable();
            $table->text('permohonan_lain')->nullable();
            $table->text('rekomendasi_1')->nullable();
            $table->text('rekomendasi_2')->nullable();
            $table->integer('cuti_status_id')->default(1);
            $table->integer('user_id');
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
        Schema::dropIfExists('cutis');
    }
}
