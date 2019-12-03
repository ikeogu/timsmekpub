<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sex');
            $table->string('dob');
            $table->string('pob');
            $table->string('education');
            $table->string('book_authored');
            $table->string('photo');
            $table->string('email');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('linkin');
            $table->mediumText('biography');

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
        Schema::dropIfExists('authors');
    }
}
