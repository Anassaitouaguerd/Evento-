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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 200);
            $table->string('description' , 255);
            $table->timestamp('date_start');
            $table->string('adress');
            $table->unsignedBigInteger('number_place');
            $table->unsignedBigInteger('category_id');
            $table->enum('type', ['auto', 'manuly'])->default('auto');
            $table->enum('status', ['approved', 'rejected' , 'pending'])->default('pending');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};