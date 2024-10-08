<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('voucher_id')->nullable();
            $table->integer('shift_record_id')->nullable();
            $table->integer('payment_method_id');
            $table->text('payment_received')->nullable();
            $table->text('payment_change')->nullable();
            $table->text('customer_name')->nullable();
            $table->text('pickup_method');
            $table->text('grand_total');
            $table->integer('total_qty');
            $table->text('total_discount_percent')->nullable();
            $table->text('total_discount_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
