<?php

use App\Enums\EmailStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('value');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('status')->default(EmailStatusEnum::pending->value);
            $table->string('code')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
