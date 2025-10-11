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
            $table->string("sls/prcs");
            $table->string("invoice");
            $table->string("debit");
            $table->string("credit");
            $table->foreignIdFor(App\Models\customer::class, 'customer_id')->constrained('customers');
            $table->foreignIdFor(App\Models\supplier::class, 'supplier_id')->constrained('supplierscle');
            $table->date("date");
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
