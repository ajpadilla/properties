<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefcases', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_cut');
            $table->date('publication_date');
            $table->string('house_number', 20);
            $table->string('block', 20);
            $table->string('area', 20);
            $table->decimal('management_fee', 5,2);
            $table->decimal('interest_on_arrears', 5,2);
            $table->decimal('interest_current', 5,2);
            $table->decimal('parking_fee', 5,2);
            $table->decimal('motorcycle_parking_fee', 5,2);
            $table->decimal('sanction_assembly', 5,2);
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
        Schema::dropIfExists('briefcases');
    }
}
