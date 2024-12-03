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
        Schema::table('curso_user', function (Blueprint $table) {
            $table->timestamp('completed_at')->nullable()->after('curso_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curso_user', function (Blueprint $table) {
            $table->dropColumn('completed_at');
        });
    }
};
