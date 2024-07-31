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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('rec_name',20);
            $table->string('rec_email');
            $table->string('rec_phone',11); // Allow phone to be null
            $table->string('rec_address', 100);
            $table->string('status')->default('In Progress');
            $table->unsignedBigInteger('rec_user_id');
            $table->unsignedBigInteger('rec_product_id');
            // Define foreign keys without cascading deletes
            $table->foreign('rec_user_id')
                  ->references('id')->on('users') // Assuming 'users' table has 'id' as primary key
                  ->onDelete('restrict') // Or 'set null', 'no action', etc. as per your requirements
                  ->onUpdate('cascade');
            
            $table->foreign('rec_product_id')
                  ->references('id')->on('products') // Assuming 'products' table has 'id' as primary key
                  ->onDelete('restrict') // Or 'set null', 'no action', etc. as per your requirements
                  ->onUpdate('cascade');

                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
