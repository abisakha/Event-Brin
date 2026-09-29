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

            // buat kolom satker id
            $table->foreignId('satker_id')
            // yang valuenya isinya id di table satker
                ->constrained('satker')
            // tidak mengizinkan user di hapus selagi masih di pakai event
                ->restrictOnDelete();

            $table->string('satker_name', 255);

            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('event_name', 255);
            $table->string('event_image', 255);
            $table->text('description')->nullable();

            $table->string('format', 255);
            $table->string('location_area', 255)->nullable();
            $table->string('location', 255);
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamp('registration_start');
            $table->timestamp('registration_end');

            // hanya boleh bilangan 0 atau posistif
            $table->unsignedBigInteger('quota');
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
