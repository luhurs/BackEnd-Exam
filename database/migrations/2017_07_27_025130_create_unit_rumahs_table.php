<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_rumahs', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('kavling');
            $table->string('blok');
            $table->string('no_rumah');
            $table->decimal('harga_rumah');
            $table->integer('luas_tanah');
            $table->integer('luas_bangunan');

            // $table->integer('customer_id')->unsigned();
            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_rumahs');
    }
}
