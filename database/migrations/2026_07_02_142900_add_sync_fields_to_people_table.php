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
        Schema::table('people', function (Blueprint $table) {
            $table->foreignId('personnel_sync_id')->nullable()->after('company_id');
            $table->boolean('is_legacy')->default(false)->after('personnel_sync_id');
            $table->timestamp('legacy_at')->nullable()->after('is_legacy');

            $table->index(['company_id', 'personnel_sync_id']);
            $table->index(['company_id', 'is_legacy']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            //
        });
    }
};
