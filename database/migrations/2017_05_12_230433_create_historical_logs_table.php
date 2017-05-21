<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricalLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historica_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('modification_date');
            $table->integer('process')->nullable();
            $table->string('modified_field', 45)->nullable();
            $table->string('updated_field', 45)->nullable();
            $table->integer('type_log_id')->unsigned();
            $table->foreign('type_log_id')
              ->references('id')
              ->on('type_logs')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
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
        Schema::dropIfExists('historica_logs');
    }
}
