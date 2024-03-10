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
            $table->uuid()->primary();
            $table->string('First name',255);
            $table->string('Last name',255);
            $table->string('E-mail',255);
            $table->integer('DOB');
            $table->enum('Role',['Applicant','Administrator']);
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
