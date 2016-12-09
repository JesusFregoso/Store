<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('sell_id')->unsigned();
            $table->decimal('quantity',11,2);
            $table->decimal('price',11,2);
            $table->decimal('discount',11,2);
            $table->timestamps();

            //foreing keys

            $table->foreign('sell_id')->references('id')->on('sells')->onDelete('restrict');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sells_details');
    }
}
