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
            $table->dateTime('transaction_time')->nullable();
            $table->string('transaction_status')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('three_ds_version')->nullable();
            $table->string('status_message')->nullable();
            $table->string('status_code')->nullable();
            $table->string('signature_key')->nullable();
            $table->dateTime('settlement_time')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('order_id')->nullable();
            $table->string('merchant_id')->nullable();
            $table->string('masked_card')->nullable();
            $table->string('gross_amount')->nullable();
            $table->string('fraud_status')->nullable();
            $table->dateTime('expiry_time')->nullable();
            $table->string('eci')->nullable();
            $table->string('currency')->nullable();
            $table->string('channel_response_message')->nullable();
            $table->string('channel_response_code')->nullable();
            $table->string('card_type')->nullable();
            $table->string('bank')->nullable();
            $table->string('approval_code')->nullable();
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
