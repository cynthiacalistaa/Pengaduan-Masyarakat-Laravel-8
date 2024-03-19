<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPengaduans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('kategori_id');
            $table->string('judul_laporan');
            $table->string('isi_laporan');
            $table->date('tgl_kejadian');
            $table->string('foto')->nullable();
            $table->bigInteger('province_id');
            $table->bigInteger('regency_id');
            $table->bigInteger('district_id');
            $table->bigInteger('village_id');
            $table->bigInteger('status');
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
        Schema::dropIfExists('tb_pengaduans');
    }
}
