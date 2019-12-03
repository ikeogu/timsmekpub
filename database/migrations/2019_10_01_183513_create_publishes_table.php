<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('author_id');
            $table->string('title');
            $table->string('isbn');
            $table->string('price');
            $table->string('available');
            $table->string('content');
            $table->string('cover_page');
            $table->string('isbn');
            $table->integer('status');

            $table->string('description');

            $table->string('year_pub');
           
            
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
        Schema::dropIfExists('publishes');
    }
}
