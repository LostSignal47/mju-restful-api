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
        Schema::create('mju_students', function (Blueprint $table) {
            $table->string('student_code',15)->primary();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('first_name_en');
            $table->string('last_name_en')->nullable();
            $table->unsignedInteger('major_id');
            $table->string('idcard');
            $table->date('birthdate')->nullable();
            $table->string('gender',1)->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mju_students');
    }
};
