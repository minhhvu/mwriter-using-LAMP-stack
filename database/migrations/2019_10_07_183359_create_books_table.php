<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Book', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('googleId')->unique();
            $table->string('title');
            $table->longText('description');
            $table->string('coverLink');
            $table->string('previewLink');
            $table->integer('publishDate');
            $table->string('authors');
            $table->mediumText('textSnippet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
