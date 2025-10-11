<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\purchase;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(purchase::class, 'purchase_id')->constrained('purchases');
            $table->date("date");
            $table->string("invoice");
            $table->string("payment_method");
            $table->integer("total");
            $table->integer("paid");
            $table->integer("due");
            $table->integer("discount");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
