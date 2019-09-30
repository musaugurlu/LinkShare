<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkLinkGroupPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_link_group', function (Blueprint $table) {
            $table->unsignedBigInteger('link_id')->index();
            $table->foreign('link_id')->references('id')->on('link_groups')->onDelete('cascade');
            $table->unsignedBigInteger('link_group_id')->index();
            $table->foreign('link_group_id')->references('id')->on('links')->onDelete('cascade');
            $table->primary(['link_id', 'link_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_link_group');
    }
}
