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
        Schema::create('cover_letters', function (Blueprint $table) {
            $table->id();
            $table->string('telegram_id')->nullable();
            $table->string('name');
            $table->string('identity_number');
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('religion');
            $table->string('marriage_status');
            $table->string('occupation');
            $table->string('education');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('address');
            $table->string('proof_of_self')->nullable();
            $table->string('necessity');
            $table->date('valid_from');
            $table->string('description');
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
        Schema::dropIfExists('cover_letters');
    }
};
