<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lev\Inward\Models\Inward;
use Lev\Product\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inward_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inward::class, 'inward_id');
            $table->foreignIdFor(Product::class, 'product_id');
            $table->integer('net_price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inward_items');
    }
};
