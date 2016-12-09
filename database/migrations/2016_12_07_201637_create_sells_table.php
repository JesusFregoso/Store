<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->string('voucher_type',20);
            $table->string('voucher_serie',7);
            $table->string('voucher_num',10);
            $table->decimal('tax',4,2);
            $table->decimal('total_price',11,2);
            $table->string('status',20);
            $table->timestamps();

            //foreing keys

            $table->foreign('provider_id')->references('id')->on('persons')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sells');
    }
}
