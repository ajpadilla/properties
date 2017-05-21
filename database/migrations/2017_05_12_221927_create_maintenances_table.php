<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->text('description');
            $table->date('next_date');
            $table->integer('periodicity');
            $table->float('amount', 8,2);
            $table->integer('fixed_asset_id')->unsigned();
            $table->foreign('fixed_asset_id')
              ->references('id')
              ->on('fixed_assets')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')
              ->references('id')
              ->on('suppliers')
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
        Schema::dropIfExists('maintenances');
    }
}
