<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tiket_id');
            $table->foreignId('user_id');
            $table->string('email')->nullable();
            $table->string('code')->nullable()->unique();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tiket_id')->references('id')->on('tikets');
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
        Schema::dropIfExists('tiket_user');
    }
}