<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lev\Outward\Models\Outward;
use Lev\Product\Models\Product;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('outward_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Outward::class);
            $table->foreignIdFor(Product::class);
            $table->integer('net_price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outward_items');
    }
};
