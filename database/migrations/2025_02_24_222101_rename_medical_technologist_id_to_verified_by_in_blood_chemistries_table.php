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
        Schema::table('blood_chemistries', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['medical_technologist_id']);

            // Rename the column
            $table->renameColumn('medical_technologist_id', 'analyst_med_tech_id');

            // Recreate the foreign key constraint
            $table->foreign('analyst_med_tech_id')->references('id')->on('medical_technologists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blood_chemistries', function (Blueprint $table) {
            // Drop the new foreign key constraint
            $table->dropForeign(['analyst_med_tech_id']);

            // Rename the column back to its original name
            $table->renameColumn('analyst_med_tech_id', 'medical_technologist_id');

            // Recreate the original foreign key constraint
            $table->foreign('medical_technologist_id')->references('id')->on('medical_technologists')->onDelete('cascade');
        });
    }
};
