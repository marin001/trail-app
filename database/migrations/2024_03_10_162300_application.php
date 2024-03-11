<?php

use Doctrine\DBAL\Schema\Column;
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
            $table->uuid('id')->primary();
            $table->string('First_name',255);
            $table->string('Last_name',255);
            $table->string('Club',255)->nullable();
            $table->foreignUuid('Race_ID')->constrained('races', 'id')->onUpdate('cascade')->onDelete('cascade');
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
