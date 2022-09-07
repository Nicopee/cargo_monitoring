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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('qantity')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign("category_id")->references('id')->on('categories')->cascadeOnDelete()->onUpdate("CASCADE");
            $table->enum('package_status', ['pending', 'transit', 'rejected', 'delivered'])->default('pending');
            $table->string('receiver_name');
            $table->unsignedBigInteger('sender_id');
            $table->foreign("sender_id")->references('id')->on('senders')->cascadeOnDelete()->onUpdate("CASCADE");
            $table->string('receiver_email');
            $table->string('receiver_contact');
            $table->integer('amount_to_pay')->default(0);
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
        Schema::dropIfExists('packages');
    }
};
