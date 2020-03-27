<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoulenteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voulenteers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('profession');
            $table->string('country');
            $table->string('city');
            $table->string('general_location')->nullable();
            $table->string('description');
            $table->string('verification_token')->nullable();
            $table->string('deletion_token')->nullable();
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
        Schema::dropIfExists('voulenteers');
    }
}
