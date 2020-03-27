<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferVoulenteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_voulenteer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voulenteer_id');
            $table->foreign('voulenteer_id')->references('id')->on('voulenteers')->onDelete('cascade');
            
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
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
        Schema::dropIfExists('offer_voulenteers');
    }
}
