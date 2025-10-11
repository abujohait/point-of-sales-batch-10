<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transections', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->string("invoice");
            $table->string("debit");
            $table->string("credit");
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('supplier_id');
            $table->date("date");




            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('supplier_id')->references('id')->on('suppliers');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transections');
    }
};
