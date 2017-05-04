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
            $table->string('identification_number', 45)->unique();
            $table->string('business_name', 45);
            $table->string('first_name', 20);
            $table->string('second_name', 20)->nullable();
            $table->string('first_surname', 25);
            $table->string('second_surname', 25)->nullable();
            $table->string('home_phone', 30);
            $table->string('auxiliary_phone', 30)->nullable();
            $table->string('cell_phone', 30);
            $table->string('auxiliary_cell', 30)->nullable();
            $table->string('home_email', 30);
            $table->string('auxiliary_email', 30)->nullable();
            $table->text('correspondence_address')->nullable();
            $table->string('city_correspondence', 30)->nullable();
            $table->string('country_correspondence', 30)->nullable();
            $table->text('office_address')->nullable();
            $table->string('city_office', 30)->nullable();
            $table->string('country_office', 30)->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', ['married', 'bachelor', 'divorced']);  
            $table->string('cod_labor_activity', 20)->nullable();
            $table->date('admission_date')->nullable();
            $table->date('cancellation_date')->nullable();
            $table->float('income_level', 8, 2)->nullable();  
            $table->float('expenses_level', 8, 2)->nullable();  
            $table->boolean('status');
            $table->integer('city_birth_id')->unsigned();
            $table->foreign('city_birth_id')
                        ->references('id')
                      ->on('municipalities')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->integer('disability_id')->nullable()->unsigned();
            $table->foreign('disability_id')
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
