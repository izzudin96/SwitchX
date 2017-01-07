<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('storeName')->nullable();
            $table->string('registrationNumber')->nullable();
            $table->text('description')->nullable();

            $table->string('bankName')->nullable();
            $table->string('bankAccountNo')->nullable();
            $table->string('bankHolderName')->nullable();

            $table->string('feature1')->nullable();
            $table->text('feature1Description')->nullable();
            $table->string('feature1Image')->nullable();

            $table->string('feature2')->nullable();
            $table->text('feature2Description')->nullable();
            $table->string('feature2Image')->nullable();

            $table->string('feature3')->nullable();
            $table->text('feature3Description')->nullable();
            $table->string('feature3Image')->nullable();

            $table->string('slider1')->nullable();
            $table->string('slider2')->nullable();
            $table->string('slider3')->nullable();

            $table->text('googleAnalyticCode')->nullable();

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
        Schema::dropIfExists('dashboard');
    }
}
