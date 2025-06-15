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
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('cascade')->after('user_id');
            $table->foreignId('parent_id')->nullable()->constrained('support_tickets')->onDelete('cascade')->after('admin_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropColumn(['admin_id', 'parent_id']);
        });
    }
};
