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
        Schema::create('worms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->unsignedSmallInteger('age');
            $table->unsignedTinyInteger('number_of_segments');
            $table->unsignedTinyInteger('number_of_hearts');
            $table->text('about_me');
            $table->text('habitat');
            $table->text('hobbies');
            $table->text('graditude');
            $table->text('passion');
            $table->text('ideal_match');
            $table->string('email')->unique();
            $table->string('avatar_url')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worms');
    }
};
