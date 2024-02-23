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
        Schema::create('our_partner_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id');
            $table->string('title');
            $table->string('description');
            $table->string('logo');
            $table->string('link');
            $table->tinyInteger('status')->default(1);
            $table->foreign('partner_id')->references('id')->on('our_partners')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_partner_details');
    }
};
