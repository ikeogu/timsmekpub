<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->bigInteger('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mode');
            $table->integer('isAdmin')->default(3);
            $table->integer('status')->default(0);
            $table->integer('agree')->default(0);
            $table->integer('amount');
            $table->bigInteger('acct_bal');
            $table->string('referral_token')->unique();
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->foreign('referrer_id')->references('id')->on('users');
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
