<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('inventory_id')->unsigned();
            $table->decimal('quantity',11,2);
            $table->decimal('buy_price',11,2);
            $table->decimal('sell_price',11,2);
            $table->timestamps();

            //foreing keys
            
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('restrict');
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
        Schema::drop('inventories_details');
    }
}
