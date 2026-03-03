<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('family_id')->constrained()->onDelete('cascade');
            $table->foreignId('organization_id')->nullable()->constrained()->onDelete('cascade'); // Jika anggota ekskul spesifik
            $table->enum('role', ['super_admin', 'admin', 'member', 'guest'])->default('member');
            $table->enum('status', ['active', 'inactive', 'pending', 'banned'])->default('pending');
            $table->timestamp('joined_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Satu user hanya bisa join sekali per family
            $table->unique(['user_id', 'family_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};