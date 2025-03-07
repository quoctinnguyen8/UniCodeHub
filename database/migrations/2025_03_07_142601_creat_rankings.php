<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // tạo bảng rankings
    public function up(): void
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            // user_id , total_score, period, start_date, end_date, created_at, updated_at
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('total_score', 15, 2)->nullable();
            $table->integer('period')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            // thời gian tạo bảng xếp hạng
           // $table->timestamp('created_at')->useCurrent();
            // thời gian cập nhật bảng xếp hạng
            // $table->timestamp('updated_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rankings');
    }
};
