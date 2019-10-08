<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class ModifyCollumnsOfBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Book', function (Blueprint $table) {
            $table->text('coverLink')->change();
            $table->text('previewLink')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Book', function (Blueprint $table) {
            $table->string('coverLink')->change();
            $table->string('previewLink')->change();
        });
    }
}
