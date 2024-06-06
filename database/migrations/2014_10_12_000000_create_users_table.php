<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('admin')->default(0);
            $table->string('token')->unique()->nullable();
            $table->string('active')->default(0)->comment('0 - under analysis; 1 - approved');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$vzJAMtYXDIln5Afw7sxQf.er0/sePoWG7xJg.fQN8yHB8quWhqm5u',
                'admin' => 1,
                'active' => 1
            )
        );
        DB::table('users')->insert(
            array(
                'name' => 'teste',
                'email' => 'teste@teste.com',
                'password' => '$2y$10$vzJAMtYXDIln5Afw7sxQf.er0/sePoWG7xJg.fQN8yHB8quWhqm5u',
                'admin' => 1,
                'active' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
