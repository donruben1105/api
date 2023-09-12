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
        Schema::create('head_counts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        $heacountArr = [
            '1-10',
            '11-50',
            '51-200',
            '201-500',
            '501-1000',
            '1001-5000',
            'More than 5000',

        ];
        Schema::create('headcounts_data', function (Blueprint $table) {
            $table->id();
            $table->string('headcount');
            $table->timestamps();
        });

        foreach ($heacountArr as $heacount) {
            DB::table('headcounts_data')->insert(['headcount' => $heacount]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_counts');
    }
};
