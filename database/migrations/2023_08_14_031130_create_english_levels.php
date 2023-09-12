<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('english_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        $englishLevelArr = [
            'Basic',
            'Bilingual',
            'Fluent',
            'Professional',
        ];
        Schema::create('englishLevels_data', function (Blueprint $table) {
            $table->id();
            $table->string('englishLevel');
            $table->timestamps();
        });

        foreach ($englishLevelArr as $englishLevel) {
            DB::table('englishLevels_data')->insert(['englishLevel' => $englishLevel]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('english_levels');
    }
};
