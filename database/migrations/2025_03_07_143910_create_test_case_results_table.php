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
        Schema::create('test_case_results', function (Blueprint $table) {
            $table->id();
            $table->integer('submission_id')->index()->nullable();
            $table->integer('test_case_id')->index()->nullable();
            $table->text('actual_output', 500)->nullable();
            $table->boolean('is_passed')->index()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_case_results');
    }
};
