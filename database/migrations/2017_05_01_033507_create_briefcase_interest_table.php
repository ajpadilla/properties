<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefcaseInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefcase_interest', function (Blueprint $table) {
            $table->increments('id');
            $table->float('percent', 8, 2);  
            $table->integer('briefcase_id')->unsigned();
            $table->foreign('briefcase_id')
            ->references('id')
            ->on('briefcases')
            ->onDelete('cascade');
            $table->integer('interest_id')->unsigned();
            $table->foreign('interest_id')
            ->references('id')
            ->on('interests')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            $table->unique(['briefcase_id', 'interest_id']);  
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
        Schema::dropIfExists('briefcase_interest');
    }
}
