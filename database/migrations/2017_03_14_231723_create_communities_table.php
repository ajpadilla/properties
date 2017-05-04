<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit', 45)->unique();
            $table->string('name', 45);
            $table->string('home_phone', 20);
            $table->string('auxiliary_phone', 20)->nullable();
            $table->string('cell_phone', 20);
            $table->string('auxiliary_cell', 20)->nullable();
            $table->string('home_email', 30);
            $table->string('auxiliary_email', 30)->nullable();
            $table->text('address');
            $table->boolean('status');
            $table->date('opening_date');
            $table->date('cancellation_date')->nullable();
            $table->text('reason_retiring')->nullable();
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')
              ->references('id')
              ->on('municipalities')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->integer('type_community_id')->unsigned();
            $table->foreign('type_community_id')
              ->references('id')
              ->on('type_communities')
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
        Schema::dropIfExists('communities');
    }
}
