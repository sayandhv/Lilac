<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('fk_department')->references('id')->on('Departments')->onDelete('cascade');
            $table->foreign('fk_designation')->references('id')->on('Designations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['fk_department']);
            $table->dropForeign(['fk_designation']);
        });
    }
};
