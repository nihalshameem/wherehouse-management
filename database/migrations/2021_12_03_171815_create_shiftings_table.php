<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shiftings', function (Blueprint $table) {
            $table->id();
            $table->integer('wb_slip_no');
            $table->date('date');
            $table->bigInteger('location_id');
            $table->bigInteger('wh_name');
            $table->bigInteger('lot_number');
            $table->bigInteger('variety');
            $table->string('truck_no');
            $table->integer('bags');
            $table->decimal('weight', 11, 2);
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
        Schema::dropIfExists('shiftings');
    }
}
