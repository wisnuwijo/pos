<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spending', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shift_record_id')->nullable();;
            $table->integer('supplier_id');
            $table->text('supplier_name');
            $table->integer('grand_total');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('spending');
    }
}
