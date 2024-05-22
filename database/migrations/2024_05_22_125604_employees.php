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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('phoneNumber');
            $table->string('country');
            $table->string('city');
            $table->string('zipCode');
            $table->string('street');
            $table->integer('buildingNumber');
            $table->integer('apartmentNumber')->nullable();
            $table->unsignedBigInteger('position_id');
            $table->date('dateOfBirth');
            $table->date('hireDate');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
