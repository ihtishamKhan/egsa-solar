<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->enum('type', ['in', 'out']);
            $table->enum('reason', ['purchase', 'sale', 'internal_use', 'return', 'adjustment']);
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->nullableMorphs('stockable'); // For linking to invoices, leads, or internal requests
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stocks');
    }
};
