<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('event')
                ->restrictOnDelete();

            $table->foreignId('registration_id')
                ->constrained('registration')
                ->restrictOnDelete();

            $table->string('status', 255);

            $table->timestamp('checked_in_at')->nullable();

            $table->timestamps();

            $table->unique('registration_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
