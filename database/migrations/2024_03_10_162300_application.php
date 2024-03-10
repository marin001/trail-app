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

        Schema::create('applications', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('First name',255);
            $table->string('Last name',255);
            $table->string('Club',255)->nullable();
            $table->foreignUuid('Race ID')->constrained(table: 'races', indexName: 'uuid');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('applications');
    }
};
