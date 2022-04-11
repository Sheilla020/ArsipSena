<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipSenasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_senas', function (Blueprint $table) {
            $table->id();
            $table->char('no_dokumen');
            $table->string('prihal');
            $table->string('keterangan');
            $table->string('nama_pengirim');
            $table->string('perusahaan_pengirim');
            $table->string('status')->default('on process');
            $table->foreignId('unit_kerja_id');
            $table->foreignId('category_id');
            $table->char('file')->nullable();
            $table->bigInteger('filesize')->nullable();
            $table->string('extension')->nullable();
            $table->date('tgl_upload');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_senas');
    }
}
