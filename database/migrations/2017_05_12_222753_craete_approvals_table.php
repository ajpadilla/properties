<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeteApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('ending_date');
            $table->date('date_voting');
            $table->boolean('status');
            $table->integer('market_rate_id')->unsigned();
            $table->foreign('market_rate_id')
              ->references('id')
              ->on('market_rates')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')
              ->references('id')
              ->on('properties')
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
        Schema::dropIfExists('approvals');
    }
}
