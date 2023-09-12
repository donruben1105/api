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
        Schema::create('freelancer_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        $freelancerTypeArr = [
            'Freellancer',
            'Full Time',
            'Part Time',
        ];
        Schema::create('freelancerTypes_data', function (Blueprint $table) {
            $table->id();
            $table->string('freelancerType');
            $table->timestamps();
        });

        foreach ($freelancerTypeArr as $freelancerType) {
            DB::table('freelancerTypes_data')->insert(['freelancerType' => $freelancerType]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer_types');
    }
};
