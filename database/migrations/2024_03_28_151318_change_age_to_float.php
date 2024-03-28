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
        Schema::table('worms', function (Blueprint $table) {
            $table->renameColumn('age', 'age_old');
        });

        Schema::table('worms', function (Blueprint $table) {
            $table->float('age')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('worms', function (Blueprint $table) {
            $table->dropColumn('age');
        });
        Schema::table('worms', function (Blueprint $table) {
            $table->renameColumn('age_old', 'age');
        });
    }
};
