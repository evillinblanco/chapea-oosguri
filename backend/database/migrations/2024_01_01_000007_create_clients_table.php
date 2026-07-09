<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('cpf_cnpj')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('state', 2);
            $table->string('zip_code');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            $table->index('email');
            $table->index('cpf_cnpj');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
