<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->float('amount', 8,2);
            $table->date('date_quote');
            $table->date('approval_date');
            $table->boolean('status');
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')
              ->references('id')
              ->on('suppliers')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->integer('community_id')->unsigned();
            $table->foreign('community_id')
              ->references('id')
              ->on('communities')
              ->onUpdate('cascade')
              ->onDelete('cascade');
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
        Schema::dropIfExists('market_rates');
    }
}
