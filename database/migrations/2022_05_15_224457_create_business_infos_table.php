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
        Schema::create('business_infos', function (Blueprint $table) {
            $table->id();
            $table->string('telegram_id')->nullable();
            $table->string('name');
            $table->string('identity_number');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('marriage_status');
            $table->string('address');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('jenisusaha');
            $table->string('jenisbarang');
            $table->string('mulaiusaha');
            $table->string('lokasiusaha');
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
        Schema::dropIfExists('business_infos');
    }
};
