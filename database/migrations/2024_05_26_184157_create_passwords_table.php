<?php

use App\Enums\PasswordStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('passwords', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('email');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('status')->default(PasswordStatusEnum::pending->value);
            $table->string('ip');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('passwords');
    }
};
