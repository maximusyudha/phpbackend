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
        Schema::create('novels', function (Blueprint $table) {
    $table->id();
    $table->integer('page_count');
    $table->date('publish_date');
    $table->string('isbn');
    $table->string('language');
    $table->string('publisher');
    $table->decimal('weight', 8, 2);
    $table->decimal('width', 8, 2);
    $table->decimal('length', 8, 2);
    $table->decimal('price', 10, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novels');
    }
};
