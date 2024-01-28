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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('domain'); // Example
            $table->string('aspek'); // Example
            $table->string('indikator'); // Example
            $table->string('tingkat'); // Example
            $table->boolean('disetujui'); // Example
            $table->string('filename'); // The name of the file in storage
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
