<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('campaign_manager_gifts', function (Blueprint $table) {
            $table->json('maximum_spend')->nullable()->after('minimum_spend');
        });
    }

    public function down(): void
    {
        Schema::table('campaign_manager_gifts', function (Blueprint $table) {
            $table->dropColumn('maximum_spend');
        });
    }
};
