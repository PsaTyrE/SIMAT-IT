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
        Schema::create('hardware_issue', function (Blueprint $table) {
            $table->unsignedBigInteger('issueID');
            $table->foreign('issueID')->references('id')->on('issue');
            $table->unsignedBigInteger('hardwareID');
            $table->foreign('hardwareID')->references('id')->on('hardware');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_issue');
    }
};
