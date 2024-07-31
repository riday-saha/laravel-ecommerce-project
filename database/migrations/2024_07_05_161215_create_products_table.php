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
            $table->string('pro_title', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->longText('pro_description')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('pro_image')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->decimal('pro_price', 10, 2); // Example for price, adjust as needed
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('pro_quantity')->unsigned();
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
