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
        $table->unsignedBigInteger('supplier_id'); // Обязательное поле
        $table->decimal('amount', 10, 2);
        $table->date('delivery_date');
        $table->string('status')->default('created');
        $table->timestamps();

        // Внешний ключ
        $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
