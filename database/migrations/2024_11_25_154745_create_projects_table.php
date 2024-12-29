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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            // $table->foreignId('client_id')->constrained('users')->nullable();
            $table->string('client_name')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('budget', 10, 2);
            $table->string('location')->nullable();
            $table->enum('status', [
                'planning',      // Initial stage
                'in_progress',   // Construction started
                'review',        // Quality checks
                'revision',      // Changes needed
                'completed'      // Project done
            ])->default('planning');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
