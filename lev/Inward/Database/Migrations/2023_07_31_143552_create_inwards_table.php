<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lev\Inward\Enums\PaymentStatus;
use Lev\Inward\Enums\PaymentType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->id();
            $table->timestamp('inward_date');
            $table->integer('document_number')->nullable();
            $table->string('payment_type')->default(PaymentType::CASH->value);
            $table->string('comment')->nullable();
            $table->timestamp('cancellation_at')->nullable();
            $table->string('closed_at')->nullable();
            $table->string('status')->default(PaymentStatus::OPEN->value);
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
