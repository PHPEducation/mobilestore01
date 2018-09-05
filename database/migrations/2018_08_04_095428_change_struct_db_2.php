<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStructDb2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasColumn('accessories', 'category_id')) {
            Schema::table('accessories', function (Blueprint $table) {
                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            });
        }
        if(!Schema::hasColumn('news', 'category_id')) {
            Schema::table('news', function (Blueprint $table) {
                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('accessories', 'category_id')) {
            Schema::table('news', function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            });
        }
        if(Schema::hasColumn('news', 'category_id')) {
            Schema::table('news', function (Blueprint $table) {
               $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            });
        }
    }
}
