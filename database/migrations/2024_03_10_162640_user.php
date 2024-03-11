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
        //
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('First_name',255);
            $table->string('Last_name',255);
            $table->string('Email',255);
            $table->integer('DOB');
            $table->enum('Role',['Applicant','Administrator']);
            $table->string('remember_token',10);
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
