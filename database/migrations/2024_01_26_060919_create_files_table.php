<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // You need to add this line to create the 'title' column.
            $table->string('filename');
            $table->timestamps();
        });
    }
    
    
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropColumn('title'); // Drop the 'title' column
        });
    }
};
