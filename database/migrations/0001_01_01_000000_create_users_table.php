<?php
// database/migrations/2025_01_01_000000_create_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'manager', 'accountant'])->default('accountant');
            $table->timestamps(); // creates created_at & updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
