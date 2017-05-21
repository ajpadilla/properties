<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_origin');
            $table->string('number_origin', 45);
            $table->float('agreement_amount', 8,2);
            $table->text('description');
            $table->date('start_date');
            $table->date('ending_date');
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
        Schema::dropIfExists('payment_agreements');
    }
}
