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
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->date('start_date');
            $table->enum('frequency_type', ['daily', 'weekly', 'monthly']);
            $table->integer('frequency_target')->nullable();
            $table->enum('habit_type', ['boolean', 'numeric']);
            $table->decimal('target_value', 8, 2)->nullable();
            $table->string('unit')->nullable();
            $table->enum('habit_status', ['active', 'paused', 'completed', 'archived']);
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habits');
    }
};
