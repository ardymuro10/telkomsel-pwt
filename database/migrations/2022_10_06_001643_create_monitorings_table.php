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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('site_id')->nullable();
            $table->string('site_name')->nullable();
            $table->string('program')->nullable();
            $table->string('list_program')->nullable();
            $table->string('type_infra')->nullable();
            $table->string('owner_infra')->nullable();
            $table->string('status')->nullable();
            $table->string('issue')->nullable();
            $table->string('vendor')->nullable();
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
        Schema::dropIfExists('monitorings');
    }
};
