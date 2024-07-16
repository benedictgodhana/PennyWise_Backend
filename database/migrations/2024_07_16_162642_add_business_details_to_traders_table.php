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
        Schema::table('traders', function (Blueprint $table) {
            $table->string('businessName')->nullable();
            $table->string('businessType')->nullable();
            $table->boolean('consentMarketing')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('traders', function (Blueprint $table) {
            $table->dropColumn('businessName');
            $table->dropColumn('businessType');
            $table->dropColumn('consentMarketing');
        });
    }
};
