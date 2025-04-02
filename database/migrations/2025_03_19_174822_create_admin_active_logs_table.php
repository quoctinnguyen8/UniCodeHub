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
        Schema::create('admin_active_logs', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true); //trạng thái hoạt động
            $table->timestamp('expires_at')->nullable(); //thời gian hết hạn
            $table->timestamp('activated_at')->nullable(); //thời gian kích hoạt
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //người dùng
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); //người tạo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_active_logs');
    }
};
