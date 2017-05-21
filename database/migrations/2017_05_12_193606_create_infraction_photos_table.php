<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfractionPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infraction_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('path');
            $table->string('complete_path');
            $table->string('complete_thumbnail_path');
            $table->integer('size');
            $table->string('extension', 3);
            $table->string('mimetype', 32);
            $table->integer('infraction_id')->unsigned();
            $table->foreign('infraction_id')
                ->references('id')
                ->on('infractions')
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
        Schema::dropIfExists('infraction_photos');
    }
}
