<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertRecordsIntoBookshelfTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('bookshelf_types')->insert([
            'name'=>'reading'
        ]);
        DB::table('bookshelf_types')->insert([
            'name'=>'completed'
        ]);
        DB::table('bookshelf_types')->insert([
            'name'=>'planning'
        ]);
        DB::table('bookshelf_types')->insert([
            'name'=>'wishlist'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('bookshelf_types')->where('id', '<', 4)->delete();
    }
}
