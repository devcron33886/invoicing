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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('total')->default(18);
            $table->string('notes');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }


};
