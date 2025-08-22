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

            // Basic project info
            $table->string('name');                  // Project name
            $table->string('client');                // Client name
            $table->string('email')->nullable();     // Client email
            $table->string('phone')->nullable();     // Client phone
            $table->string('address')->nullable();   // Project address (fixed spelling)
            
            // Project details
            $table->enum('status', [
                'Planned', 'Ongoing', 'Completed', 'On Hold', 'Cancelled'
            ])->default('Planned');
            $table->date('start_date')->nullable();  // Optional start date
            $table->date('deadline')->nullable();    // Deadline
            $table->decimal('budget', 15, 2)->nullable();   // Project budget
            $table->decimal('cost', 15, 2)->nullable();     // Actual cost
            $table->decimal('profit', 15, 2)->nullable();   // Profit estimation
            $table->text('description')->nullable(); // Description / notes

            // Project team
            $table->unsignedBigInteger('manager_id')->nullable(); // user_id of manager
            $table->foreign('manager_id')->references('id')->on('users')->nullOnDelete();

            // Timestamps
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
