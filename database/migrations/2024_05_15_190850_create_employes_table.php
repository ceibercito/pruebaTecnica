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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('firstLastName', 20);
            $table->string('secondLastName', 20);
            $table->string('firstName', 20);
            $table->string('otherName', 50)->nullable();
            $table->string('countryEmployment', 20);
            $table->string('idType', 50);
            $table->string('idNumber', 20);
            $table->string('email', 20);
            $table->date('admission');
            $table->string('area', 100);
            $table->string('state', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
