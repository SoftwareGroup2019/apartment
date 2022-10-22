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
        Schema::create('apartment_services', function (Blueprint $table) {

            $table->unsignedBigInteger('apartment_id')->index();
            $table->unsignedBigInteger('service_id')->index();
        
            $table->foreign('apartment_id')->references('id')->on('apartments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        
            $table->foreign('service_id')->references('id')->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('description');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_services');
    }
};
