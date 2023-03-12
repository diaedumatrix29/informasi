<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kecamatan')->unique();
            $table->string('slug')->unique();
            $table->text('meta_description');
            $table->text('title');
            $table->text('deskripsi');
            $table->string('foto_kecamatan');
            $table->bigInteger('kota_id')->unsigned(20);
            $table->foreign('kota_id')->references('id')->on('kota');
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
        Schema::dropIfExists('kecamatan');
    }
}
