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
    Schema::table('family_members', function (Blueprint $table) {
        $table->index(['family_id', 'status']);
    });
}

public function down(): void
{
    Schema::table('family_members', function (Blueprint $table) {
        $table->dropIndex(['family_id', 'status']);
    });
}
};
