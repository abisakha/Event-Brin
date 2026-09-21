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
        Schema::create('event', function (Blueprint $table) {
            $table->id();

            $table->foreignId('satker_id')
                ->constrained('satker')
                ->restrictOnDelete();

            $table->string('satker_name', 255);

            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('event_name', 255);
            $table->string('description', 255)->nullable();
            $table->string('location', 255);

            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamp('registration_start');
            $table->timestamp('registration_end');

            $table->integer('quota');
            $table->string('status', 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
