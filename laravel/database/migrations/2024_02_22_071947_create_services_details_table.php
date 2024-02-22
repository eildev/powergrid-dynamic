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
        Schema::create('services_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('services_id');
            $table->foreign('services_id')->references('id')->on('our_services')->onDelete('cascade');
            $table->string('services_details_title')->nullable();
            $table->text('services_details_description')->nullable();
            $table->string('services_details_icon')->nullable();
            $table->string('services_details_image')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_details');
    }
};
