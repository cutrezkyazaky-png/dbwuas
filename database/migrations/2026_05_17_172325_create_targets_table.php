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
    Schema::create('targets', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('category');
        $table->integer('target_amount');
        $table->integer('current_amount')->default(0);
        $table->date('deadline');
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
};
