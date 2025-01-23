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
        Schema::create('mainpictures', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->notnull();
            $table->string('sub_heading')->notnull();
            $table->string('image')->notnull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mainpictures');
    }
};
