<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lev\Product\Models\Product;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock_logs', function (Blueprint $table) {
            $table->id();
            $table->morphs('eventable');
            $table->foreignIdFor(Product::class);
            $table->integer('quantity');
            $table->integer('updated_quantity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_logs');
    }
};
