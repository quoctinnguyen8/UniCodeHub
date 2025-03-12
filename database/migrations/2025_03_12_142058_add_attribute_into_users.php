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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_dnc_student')->default(false);
            $table->integer('student_id')->nullable();       
            $table->string('class_id')->nullable();          
            $table->unsignedBigInteger('role_id')->nullable()->index(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_dnc_student', 'student_id', 'class_id', 'role_id']);
        });
    }
};
