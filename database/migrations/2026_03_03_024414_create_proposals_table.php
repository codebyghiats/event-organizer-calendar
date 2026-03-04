<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained()->onDelete('cascade');
            $table->foreignId('organization_id')->constrained()->onDelete('cascade');
            $table->foreignId('submitted_by')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Judul kegiatan yang diajukan
            $table->text('description');
            $table->text('objectives'); // Tujuan kegiatan
            $table->dateTime('proposed_start_date');
            $table->dateTime('proposed_end_date');
            $table->decimal('budget', 15, 2)->default(0);
            $table->string('location');
            $table->integer('expected_participants')->nullable();
            $table->json('attachments')->nullable(); // File lampiran
            $table->enum('status', ['draft', 'submitted', 'under_review', 'approved', 'rejected', 'revision_needed'])->default('draft');
            $table->text('admin_notes')->nullable(); // Catatan dari admin
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};