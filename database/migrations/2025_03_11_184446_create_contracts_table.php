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
    Schema::create('contracts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 10, 2);
        $table->integer('quantity');
        $table->date('delivery_date');
        $table->string('status')->default('created');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
