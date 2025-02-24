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
        Schema::table('hematologies', function (Blueprint $table) {
            // Add the new foreign key column
            $table->foreignId('verified_by_med_tech_id')->nullable()->constrained('medical_technologists')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hematologies', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['verified_by_med_tech_id']);
            // Drop the column
            $table->dropColumn('verified_by_med_tech_id');
        });
    }
};
