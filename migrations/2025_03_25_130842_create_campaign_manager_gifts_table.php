<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaign_manager_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('product_uuid');
            $table->string('product_name');
            $table->json('minimum_spend')->nullable();
            $table->json('maximum_spend')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_manager_gifts');
    }
};
