<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('identification_number');
            $table->text('business_name');
            $table->string('first_name', 20);
            $table->string('second_name', 20);
            $table->string('first_surname', 25);
            $table->string('second_surname', 25);
            $table->string('home_phone', 30);
            $table->string('auxiliary_phone', 30)->nullable();
            $table->string('cell_phone', 30);
            $table->string('auxiliary_cell', 30)->nullable();
            $table->string('home_email');
            $table->string('auxiliary_email', 30)->nullable();
            $table->text('correspondence_address');
            $table->string('city_correspondence', 30);
            $table->string('country_correspondence', 30);
            $table->text('office_address');
            $table->string('city_office', 30);
            $table->string('country_office', 30);
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', ['married', 'bachelor', 'divorced']);  
            $table->string('cod_labor_activity', 20);
            $table->date('admission_date');
            $table->date('cancellation_date');
            $table->boolean('status');
            $table->integer('city_birth')->unsigned();
            $table->foreign('city_birth')
                        ->references('id')
                      ->on('municipalities')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->integer('disability')->unsigned();
            $table->foreign('disability')
                        ->references('id')
                      ->on('disabilities')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->integer('educational_level_id')->unsigned();
            $table->foreign('educational_level_id')
                        ->references('id')
                      ->on('educational_levels')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->integer('type_identification_id')->unsigned();
            $table->foreign('type_identification_id')
                        ->references('id')
                      ->on('type_identifications')
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
        Schema::dropIfExists('persons');
    }
}
