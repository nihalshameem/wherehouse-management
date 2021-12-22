<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->id();
            $table->integer('wh_id');
            $table->foreign('wh_id')->references('id')->on('w_h_names');
            $table->integer('wh_sub_id');
            $table->foreign('wh_sub_id')->references('id')->on('w_h_sub_names');
            $table->date('date')->nullable();
            $table->decimal('quantity',5,2)->default(0);
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
        Schema::dropIfExists('openings');
    }
}
