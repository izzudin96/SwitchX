<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registrationNumber');
            $table->text('description');
            $table->string('bankName');
            $table->string('bankAccountNo');
            $table->string('bankHolderName');
            $table->string('feature1');
            $table->string('feature1Description');
            $table->string('feature2');
            $table->string('feature2Description');
            $table->string('feature3');
            $table->string('feature3Description');
            $table->text('googleAnalyticCode');
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
        Schema::dropIfExists('dashboards');
    }
}
