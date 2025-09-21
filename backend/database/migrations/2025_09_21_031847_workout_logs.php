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
        Schema::create('workout_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_session_id')->constrained('workout_sessions')->onDelete('cascade');
            $table->foreignId('workout_exercises_id')->constrained('workout_exercises')->onDelete('cascade');
            $table->integer('actual_sets');
            $table->integer('actual_repetitions');
            $table->decimal('actual_weight', 8, 2);
            $table->text('notes')->nullable();
            $table->timestamp('logged_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_logs');
        Schema::dropIfExists('workout_exercises');
        Schema::dropIfExists('exercises');

    }
};
