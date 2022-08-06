<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('package_id');
            $table->string('destination');
            $table->string('package_status');
            $table->string('expected_delivery_date');
            $table->unsignedBigInteger('sender_id');
            $table->enum('payment_status', ['paid', 'un_paid'])->default('un_paid');
            $table->foreign("sender_id")->references('id')->on('senders')->cascadeOnDelete()->onUpdate("CASCADE");
            $table->string('amount');
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
};
