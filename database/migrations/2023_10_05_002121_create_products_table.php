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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('product_category_id', 36)->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('description', 500)->nullable();
            $table->text('content')->nullable();
            $table->text('photo')->nullable();
            $table->text('photos')->nullable();
            $table->decimal('amount', 8, 2);
            $table->decimal('amount_sale', 8, 2)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
