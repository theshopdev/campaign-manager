<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('campaign_manager_gifts', function (Blueprint $table) {
            $table->boolean('is_concept')->default(false)->after('id');
        });
    }
};
