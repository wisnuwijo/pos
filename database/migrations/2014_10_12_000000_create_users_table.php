<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id');
            $table->integer('shift_record_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->text('name');
            $table->text('email')->nullable();
            $table->text('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->string('api_token', 80)->unique()
                  ->nullable()
                  ->default(null);
            $table->text('secret');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
