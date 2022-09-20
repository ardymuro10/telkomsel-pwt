<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_poors', function (Blueprint $table) {
            $table->id();
            $table->string('telegram_id')->nullable();
            $table->string('name');
            $table->string('identity_number');
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('address');
            $table->string('occupation');
            $table->string('necessity');
            $table->string('status')->default('Belum Dicetak');
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
        Schema::dropIfExists('mail_poors');
    }
};
