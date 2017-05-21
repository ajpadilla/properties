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
            $table->string('identification_number', 45);
            $table->string('supplier_regime', 50);
            $table->string('business_name', 50);
            $table->text('legal_representative');
            $table->string('economic_activity', 50);
            $table->date('admission_date');
            $table->text('address');
            $table->string('home_phone', 20);
            $table->string('auxiliary_phone', 20)->nullable();
            $table->string('cell_phone', 20);
            $table->string('auxiliary_cell', 20)->nullable();
            $table->string('home_email', 30);
            $table->string('auxiliary_email', 30)->nullable();
            $table->integer('type_identification_id')->unsigned();
            $table->foreign('type_identification_id')
              ->references('id')
              ->on('type_identifications')
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
        Schema::dropIfExists('suppliers');
    }
}
