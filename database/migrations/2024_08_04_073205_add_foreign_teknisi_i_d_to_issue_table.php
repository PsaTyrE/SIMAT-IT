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
        Schema::table('issue', function (Blueprint $table) {
            $table->unsignedBigInteger('teknisiID')->nullable();
            $table->foreign('teknisiID')->references('id')->on('teknisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('issue', function (Blueprint $table) {
            $table->dropForeign(['teknisiID']);
        });
    }
};
