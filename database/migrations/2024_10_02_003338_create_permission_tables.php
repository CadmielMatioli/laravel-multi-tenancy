<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

return new class extends Migration {

    public function up(): void
    {

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::orderedUuid());
            $table->string('name')->unique();
            $table->string('description');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::orderedUuid());
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categories_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::orderedUuid());
            $table->string('name');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::orderedUuid());
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::orderedUuid());
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down(): void
    {
        Schema::drop('permissions');
        Schema::drop('categories');
        Schema::drop('categories_permissions');
        Schema::drop('roles');
        Schema::drop('company_user_role');
        Schema::drop('permission_role');
    }
};
