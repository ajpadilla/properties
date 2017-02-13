<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_identification_id')->unsigned();
            $table->foreign('type_identification_id')
              ->references('id')
              ->on('types_identifications')
              ->onUpdate('cascade');
              ->onDelete('cascade');
            $table->integer('identification_number');
            $table->string('business_name', 50);
            $table->text('legal_representative');
            $table->string('economic_activity', 30);
            $table->dateTime('admission_date');
            $table->text('address_1');
            $table->text('address_2');
            $table->string('home_phone', 30);
            $table->string('auxiliary_phone', 30)->nullable();
            $table->string('home_phone', 30);
            $table->string('cell_phone', 30)->nullable();
            $table->string('auxiliary_cell', 30)->nullable();
            $table->string('home_email');
            $table->string('auxiliary_email', 30)->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
