<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->boolean('status')->default(1);
            $table->integer('view')->default(0);
            $table->integer('ram');
            $table->string('hard_disk');
            $table->text('specification_more');
            $table->string('slug');
            $table->string('cpu');
            $table->string('operating_system');
            $table->string('pin');
            $table->string('screen');
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
        Schema::dropIfExists('products');
    }
}
