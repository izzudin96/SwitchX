<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('poscode')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('status')->default('Processing order...')->nullable();
            $table->string('payment_status')->default('Unverified');
            $table->string('post_tracking')->nullable();
            $table->integer('submitted')->default(0)->nullable();
            $table->text('items')->nullable();
            $table->double('amount')->default(0)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
