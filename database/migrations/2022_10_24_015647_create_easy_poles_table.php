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
        Schema::create('easy_poles', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable();
            $table->string('region')->nullable();
            $table->string('site_id')->nullable();
            $table->string('site_name')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('site_id_pole')->nullable();
            $table->string('site_name_pole')->nullable();
            $table->string('lat_pole')->nullable();
            $table->string('long_pole')->nullable();
            $table->string('type_easypole')->nullable();
            $table->string('propose_mitra_pole')->nullable();
            $table->string('propose_mitra_fo')->nullable();
            $table->string('komit_revreg')->nullable();
            $table->string('avg_revsur')->nullable();
            $table->string('rev_shifa')->nullable();
            $table->string('dis_poletobbu')->nullable();
            $table->string('dis_poletosite')->nullable();
            $table->string('front_hauldis')->nullable();
            $table->string('objective')->nullable();
            $table->string('priority')->nullable();
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
        Schema::dropIfExists('easy_poles');
    }
};
