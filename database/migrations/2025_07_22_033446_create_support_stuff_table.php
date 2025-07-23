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
        Schema::create('support_stuff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->enum('status', ['active', 'inActive'])->default('active');
            $table->string('avatar')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
        Schema::create('support_stuff_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('support_stuff_id')->constrained('support_stuff')->onDelete('cascade');
            $table->string('action');
            $table->text('description')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_stuff');
        Schema::dropIfExists('support_stuff_logs');
    }
};
