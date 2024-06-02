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
        Schema::create('coffee_beans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('origin')->nullable();
            $table->string('process')->nullable();
            $table->string('elevation')->nullable();
            $table->string('notes')->nullable();
            $table->text('description')->nullable();
            $table->integer('weight');
            $table->integer('price');
            $table->integer('stock')->nullable();
            $table->boolean('availability')->nullable();
            $table->foreignId('producer_id')->constrained(table: 'producers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('varietal_id')->constrained(table: 'varietals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('roasttype_id')->constrained(table: 'roasttypes')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_beans');
    }
};