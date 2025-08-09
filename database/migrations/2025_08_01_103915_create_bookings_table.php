<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->string('from_city');
        $table->string('to_city');
        $table->date('depart_date')->nullable();
        $table->date('return_date')->nullable();
        $table->string('trip_type'); // Round Trip, One Way, etc.
        $table->string('travelers');
        $table->string('flight_class');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
