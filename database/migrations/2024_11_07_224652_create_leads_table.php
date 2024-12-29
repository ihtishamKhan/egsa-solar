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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company')->nullable();
            $table->string('street_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('contact_number');
            $table->string('additional_number')->nullable();
            $table->string('email')->nullable();
            $table->string('interest_in')->nullable();
            $table->string('installation_location')->nullable();
            $table->string('surface_orientation')->nullable();
            $table->string('ownership_status')->nullable();
            $table->string('surface_age')->nullable();
            $table->integer('power_consumption')->nullable();
            $table->float('sunny_area_sqm')->nullable();
            $table->boolean('storage_interest')->nullable();
            $table->string('surface_inclination')->nullable();
            $table->string('purchase_type')->nullable();
            $table->string('additional_interests')->nullable();
            $table->text('additional_information')->nullable();
            $table->date('date')->nullable();
            $table->string('request_id')->nullable();
            $table->string('status')->default('new');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('leads');
    }
};
