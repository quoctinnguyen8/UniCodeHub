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
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();
            // code theo này 
           // exercise_id INT, -- ID của bài tập mà test case thuộc về (có thể NULL)
            //input TEXT, -- Đầu vào của test case (có thể NULL)
           // expected_output TEXT, -- Đầu ra mong đợi của test case (có thể NULL)
            //created_at TIMESTAMP, -- Thời gian tạo
            $table->text('input')->nullable(); // Đầu vào test case (có thể NULL)
            $table->text('expected_output')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_cases');
    }
};
