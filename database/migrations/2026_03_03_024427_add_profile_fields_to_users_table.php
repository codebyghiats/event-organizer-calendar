<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('avatar')->nullable()->after('phone');
            $table->date('birth_date')->nullable()->after('avatar');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('birth_date');
            $table->text('bio')->nullable()->after('gender');
            $table->string('address')->nullable()->after('bio');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active')->after('remember_token');
            $table->timestamp('last_login_at')->nullable()->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'avatar',
                'birth_date',
                'gender',
                'bio',
                'address',
                'status',
                'last_login_at'
            ]);
        });
    }
};