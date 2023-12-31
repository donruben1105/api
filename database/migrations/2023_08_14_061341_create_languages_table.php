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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        $languageArr = [
            'Arabic',
            'Chinese',
            'English',
            'French',
        ];
        Schema::create('languages_data', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->timestamps();
        });

        foreach ($languageArr as $language) {
            DB::table('languages_data')->insert(['language' => $language]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
