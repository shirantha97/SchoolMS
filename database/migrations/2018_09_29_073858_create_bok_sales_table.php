<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBokSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bok_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cus_id');
            $table->integer('pro_id');
            $table->integer('qty');
            $table->double('price');
            $table->integer('dis');
            $table->double('amount');
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
        Schema::dropIfExists('bok_sales');
    }
}
