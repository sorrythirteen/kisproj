<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('accounting_entries', function (Blueprint $table) {
        $table->id();
        $table->foreignId('contract_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 10, 2);
        $table->date('payment_date');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounting_entries');
    }
};
