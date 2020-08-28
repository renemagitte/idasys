<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_of_garment')->nullable();
            $table->string('status')->nullable();
            $table->string('storage')->nullable();
            $table->string('brand')->nullable();
            $table->string('purchase_year')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('material')->nullable();
            $table->string('condition')->nullable();
            $table->string('size')->nullable();
            $table->string('measurements')->nullable();
            $table->int('retail_price')->nullable();
            $table->int('my_price')->nullable();
            $table->int('my_profit')->nullable();
            $table->date('my_sell_date')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
        Schema::dropIfExists('garments');
    }
}
