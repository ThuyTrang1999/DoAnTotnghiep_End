<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique;
            $table->integer('number');
            $table->string('unit');
            $table->string('SKU');
            $table->text('desc');
            $table->text('short_desc');
            $table->integer('category_id')->unsigned();
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('author_id')->unsigned();
            $table->integer('vendor_id');
            //$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('price');
            $table->string('discout_price');
            $table->string('top');
            $table->float('rates');
            $table->integer('amount_rate');
            $table->string('status');
            $table->timestamps();
            $table->integer('brand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produces');
    }
}
