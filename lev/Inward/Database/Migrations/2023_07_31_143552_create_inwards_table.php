<?php

use App\Enums\StockMoveStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lev\Partner\Models\Partner;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->id();
            $table->string('document_number')->nullable();
            $table->date('inward_date');
            $table->foreignIdFor(Partner::class);
            $table->string('payment_type');
            $table->string('comment')->nullable();
            $table->date('cancellation_at')->nullable();
            $table->date('closed_at')->nullable();
            $table->string('status')->default(StockMoveStatus::OPEN->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inwards');
    }
};
