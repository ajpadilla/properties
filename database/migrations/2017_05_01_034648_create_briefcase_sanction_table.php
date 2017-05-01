<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefcaseSanctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefcase_sanction', function (Blueprint $table) {
            $table->increments('id');
            $table->float('amount', 8, 2);  
            $table->integer('briefcase_id')->unsigned();
            $table->foreign('briefcase_id')
            ->references('id')
            ->on('briefcases')
            ->onDelete('cascade');
            $table->integer('sanction_id')->unsigned();
            $table->foreign('sanction_id')
            ->references('id')
            ->on('sanctions')
            ->onDelete('restrict')
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
        Schema::dropIfExists('briefcase_sanction');
    }
}
