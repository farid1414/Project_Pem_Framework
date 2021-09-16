<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftrAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftr_admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_perushaan');
            $table->string('email', 100);
            $table->string('surat', 100);
            $table->string('logo', 100);
            $table->string('jasa', 50);
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
        Schema::dropIfExists('daftr_admins');
    }
}