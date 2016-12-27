<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShirtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shirts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description');
            $table->integer('price');
            $table->integer('xxs')->nullable()->default(0);
            $table->integer('xs')->nullable()->default(0);
            $table->integer('s')->nullable()->default(0);
            $table->integer('m')->nullable()->default(0);
            $table->integer('l')->nullable()->default(0);
            $table->integer('xl')->nullable()->default(0);
            $table->integer('xxl')->nullable()->default(0);
            $table->integer('xxxl')->nullable()->default(0);
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
        Schema::dropIfExists('shirts');
    }
}
