<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbMasyarakat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_masyarakat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('no_telp');
            $table->text('alamat');
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
        Schema::dropIfExists('tb_masyarakat');
    }
}
