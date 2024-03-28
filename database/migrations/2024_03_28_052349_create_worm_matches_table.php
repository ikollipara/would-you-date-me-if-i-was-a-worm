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
        Schema::create('worm_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worm_id')->constrained()->cascadeOnDelete();
            $table->foreignId('match_id')->constrained('worms')->cascadeOnDelete();
            $table->boolean('worm_approved')->default(false);
            $table->boolean('match_approved')->default(false);
            $table->boolean('is_mutual')->storedAs('worm_approved AND match_approved');
            $table->timestamps();

            $table->unique(['worm_id', 'match_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worm_matches');
    }
};
