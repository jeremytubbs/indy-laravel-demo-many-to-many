<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorObjectPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_object', function (Blueprint $table) {
            $table->integer('actor_id')->unsigned()->index();
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');
            $table->integer('object_id')->unsigned()->index();
            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
            $table->primary(['actor_id', 'object_id']);
            $table->string('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actor_object');
    }
}
