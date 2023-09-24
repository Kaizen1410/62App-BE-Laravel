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
        Schema::create('payment_notifications', function (Blueprint $table) {
            $table->id();
            $table->dateTime('transaction_time');
            $table->string('transaction_status');
            $table->string('transaction_id');
            $table->string('status_message');
            $table->string('status_code');
            $table->string('signature_key');
            $table->string('payment_type');
            $table->string('order_id');
            $table->string('merchant_id');
            $table->string('masked_card');
            $table->string('gross_amount');
            $table->string('fraud_status');
            $table->string('eci');
            $table->string('currency');
            $table->string('channel_response_message');
            $table->string('channel_response_code');
            $table->string('card_type');
            $table->string('bank');
            $table->string('approval_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_notifications');
    }
};
