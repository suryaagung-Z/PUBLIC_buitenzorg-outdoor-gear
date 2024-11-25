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
        Schema::create('products', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->uuid('id')->unique();
            $table->foreignUuid('category_id');
            $table->string('name', length: 100);
            $table->string('sku', length: 50)->nullable();
            $table->text('description');
            $table->unsignedInteger('price');
            $table->unsignedInteger('stock');
            $table->float('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
