<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            if (!Schema::hasColumn('payments', 'booking_id')) {
                // create a nullable FK to bookings.id
                $table->foreignId('booking_id')
                      ->nullable()
                      ->constrained('bookings')
                      ->nullOnDelete(); // set to NULL if the booking is deleted
            }
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'booking_id')) {
                $table->dropConstrainedForeignId('booking_id'); // drops FK + column
            }
        });
    }
};
