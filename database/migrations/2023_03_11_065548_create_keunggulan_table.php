<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeunggulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keunggulan', function (Blueprint $table) {
            $table->id();
            $table->string('icon_keunggulan')->nullable();
            $table->string('judul_keunggulan');
            $table->text('isi_keunggulan');
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
        Schema::dropIfExists('keunggulan');
    }
}
