<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeCommunityIdToCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->integer('type_community')->unsigned()->after('municipality_id');
            $table->foreign('type_community')
                        ->references('id')
                      ->on('types_communities')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->dropForeign('communities_type_community_foreign');
            $table->dropColumn('type_community');
        });
    }
}
