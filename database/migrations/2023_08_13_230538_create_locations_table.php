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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        $locationArr = [
            'Africa',
            'Asia',
            'Afghanistan',
            'Armenia',

        ];
        Schema::create('locations_data', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->timestamps();
        });

        foreach ($locationArr as $location) {
            DB::table('locations_data')->insert(['location' => $location]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
