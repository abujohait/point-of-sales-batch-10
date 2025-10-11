<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\supplier;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->string("invoice");
            $table->foreignIdFor(supplier::class, 'supplier_id')->constrained('suppliers');
            $table->string("payment_method");
            $table->string("total");
            $table->string("paid");
            $table->string("due");
            $table->string("discount");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
