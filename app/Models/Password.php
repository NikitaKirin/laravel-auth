<?php

namespace App\Models;

use App\Enums\PasswordStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'email',
        'status',
        'ip',
        'user_id',
    ];

    protected $casts = [
        'status' => PasswordStatusEnum::class,
    ];

    public static function booted()
    {
        static::creating(function (Password $password) {
            $password->fill(['uuid' => uuid()]);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updateStatus(PasswordStatusEnum $status): bool
    {
        if($this->status->is($status)) {
            return false;
        }

        return $this->update(['status' => $status]);
    }
}
