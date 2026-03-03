<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Nama ekskul/organisasi
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->enum('type', ['academic', 'non_academic', 'sports', 'arts', 'other'])->default('non_academic');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('head_id')->nullable()->constrained('users')->nullOnDelete(); // Ketua
            $table->foreignId('advisor_id')->nullable()->constrained('users')->nullOnDelete(); // Pembimbing
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};