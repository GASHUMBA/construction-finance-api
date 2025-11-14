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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('client')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('adress')->nullable();
        $table->string('status')->default('planned'); // e.g., planned, in
        $table->date('deadline')->nullable(); // Project deadline
        $table->decimal('budget', 15, 2)->default(0);
        $table->string('location')->nullable();
        $table->string('manager')->nullable();
        $table->string('client_id')->nullable(); // Optional: related client
        $table->string('manager_id')->nullable(); // Optional: manager responsible
        $table->string('created_by')->nullable(); // User who created the project
        $table->string('updated_by')->nullable(); // User who last updated the project
        $table->date('created_at')->nullable();
        $table->date('updated_at')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
