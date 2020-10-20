<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_record', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('active')->default(0);
            $table->integer('user_id');
            $table->integer('shift_id')->nullable();
            $table->datetime('start');
            $table->datetime('finish')->nullable();
            $table->text('opening_balance');
            $table->text('closing_balance')->nullable();
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
        Schema::dropIfExists('shift_record');
    }
}
