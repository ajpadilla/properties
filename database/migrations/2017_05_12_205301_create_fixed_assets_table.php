<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('area', 45);
            $table->integer('quantity');
            $table->integer('unit_value');
            $table->integer('inventory_number')->nullable();
            $table->text('depreciation_method')->nullable();
            $table->boolean('status');
            $table->date('date_purchase')->nullable();
            $table->date('discharge_date')->nullable();
            $table->integer('warranty')->nullable();
            $table->integer('common_zone_id')->unsigned();
            $table->foreign('common_zone_id')
              ->references('id')
              ->on('common_zones')
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
        Schema::dropIfExists('fixed_assets');
    }
}
