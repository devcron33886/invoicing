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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->references('id')->on('invoices');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->timestamps();
            $table->softDeletes();
        });
    }


};
