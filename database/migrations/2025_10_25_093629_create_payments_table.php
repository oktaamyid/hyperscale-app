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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('order_id')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('plan'); // starter, professional, enterprise
            $table->string('billing'); // monthly, yearly
            $table->decimal('amount', 10, 2);
            $table->string('payment_method'); // qris, credit_card, paypal, bank_transfer
            $table->string('status')->default('pending'); // pending, success, failed, expired
            $table->text('payment_url')->nullable();
            $table->text('qr_code_url')->nullable();
            $table->json('tako_response')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            
            $table->index('order_id');
            $table->index('customer_email');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
