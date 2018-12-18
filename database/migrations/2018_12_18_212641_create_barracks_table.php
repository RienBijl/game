<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('town_id');
            $table->integer('knights')->default(0);
            $table->integer('archers')->default(0);
            $table->integer('footmen')->default(0);
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
        Schema::dropIfExists('barracks');
    }
}
