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
        Schema::create('general__settings', function (Blueprint $table) {
            $table->id();
            $table->string("Company_Name");
            $table->string("Logo");
            $table->string("Phone");
            $table->string("Email");
            $table->string("Address");
            $table->string("Default_Currency");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general__settings');
    }
};
