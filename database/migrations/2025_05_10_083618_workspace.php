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
        Schema::create('workspace', function (Blueprint $table) {
            $table->bigIncrements('workspaceId');
            $table->string('name');
            $table->foreignId('userId')->constrained('user', 'userId')->onDelete('cascade');
            $table->timestamp('created_date');
            $table->timestamp('modified_date');
            $table->timestamp('deleted_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace');
    }
};
