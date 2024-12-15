<?php

namespace App\Models;

use App\Enums\EmailStatusEnum;
use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasUuid;
    use BelongsToUser;

    protected $fillable = [
        'uuid',
        'value',
        'status',
        'user_id',
        'code',
    ];

    protected $casts = [
        'status' => EmailStatusEnum::class,
        'code' => 'encrypted',
    ];

    public function updateStatus(EmailStatusEnum $status): bool
    {
        if ($this->status->is($status)) {
            return false;
        }

        return $this->update(['status' => $status]);
    }

    public static function booted(): void
    {
        self::creating(function (Email $email) {
            $email->code = code();
        });
    }
}
