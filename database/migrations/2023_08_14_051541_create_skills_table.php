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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        $skillArr = [
            'PHP',
            'Javascript',
            'Typescript',
            'Python',
        ];
        Schema::create('skills_data', function (Blueprint $table) {
            $table->id();
            $table->string('skill');
            $table->timestamps();
        });

        foreach ($skillArr as $skill) {
            DB::table('skills_data')->insert(['skill' => $skill]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
