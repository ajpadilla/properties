<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('original_filename');
            $table->string('mime');
            $table->string('extension');
            $table->string('complete_path');
            $table->integer('community_id')->unsigned();
            $table->foreign('community_id')
                ->references('id')
                ->on('communities')
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
        Schema::dropIfExists('community_photos');
    }
}
