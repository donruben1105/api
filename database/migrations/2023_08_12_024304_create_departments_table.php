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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        $departmentArr = [
            'Advertising',
            'Community Service and Admin Support',
            'English',
            'Finance and Management',
            'Graphics and Multimedia',
            'Marketing and Sales',
            'Office and Admin (Virtual Assistant)',
            'Professional Services',
            'Project Management',
            'Software Development/Programming',
            'Web Development',
            'Webmaster',
            'Writing',
        ];
        Schema::create('departments_data', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->timestamps();
        });

        foreach ($departmentArr as $department) {
            DB::table('departments_data')->insert(['department' => $department]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
        Schema::dropIfExists('departments_data');
    }
};
