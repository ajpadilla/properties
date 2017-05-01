<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefcaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefcase', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_cut');
            $table->date('publication_date');
            $table->float('honorarium', 8, 2);
            $table->float('total_capital', 8, 2);
            $table->float('total_sanction', 8, 2);
            $table->float('total_interest', 8, 2);
            $table->float('total_debt', 8, 2);
            $table->boolean('debt_indicator');
            $table->boolean('sms_indicator');
            $table->float('positive_balance', 8, 2);
            $table->string('application_code', 20);
            $table->integer('debt_height');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')
            ->references('id')
            ->on('properties')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('briefcase');
    }
}
