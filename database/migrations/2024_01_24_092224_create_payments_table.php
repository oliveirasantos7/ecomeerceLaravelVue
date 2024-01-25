<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references(column:'id')->on(table:'orders');
            $table->decimal(column:'amount');
            $table->string(column:'status');
            $table->string(column:'type');
            $table->foreignIdFor(model:User::class, column:'created_by')->nullable();
            $table->foreignIdFor(model:User::class, column:'updated_by')->nullable();






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
