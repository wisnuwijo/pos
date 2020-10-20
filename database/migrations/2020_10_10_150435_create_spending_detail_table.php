<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spending_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spending_id');
            $table->integer('goods_id');
            $table->text('goods_category');
            $table->text('goods_name');
            $table->integer('qty');
            $table->text('price');
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
        Schema::dropIfExists('spending_detail');
    }
}
