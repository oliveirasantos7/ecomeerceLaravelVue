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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string(column:'type');
            $table->string(column:'address1');
            $table->string(column:'address2');
            $table->string(column:'city');
            $table->string(column:'state')->nullable();
            $table->string(column:'zipcode');
            $table->string(column:'country_code');
            $table->foreignId('customer_id')->references(column:'id')->on(table:'customers');
            $table->foreign('country_code')->references(column:'code')->on(table:'countries');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
