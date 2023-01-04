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
    public function up():void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('stripe_id');
            $table->integer('subtotal');
            $table->integer('tax')->default(0);
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();
        });
    }

};
