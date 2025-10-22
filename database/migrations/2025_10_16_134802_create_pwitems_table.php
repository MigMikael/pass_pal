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
        Schema::create('pwitems', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug')->unique();
            $table->string('site')->nullable()->index();
            $table->text('username');
            $table->text('password');
            $table->text('note')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pwitems');
    }
};
