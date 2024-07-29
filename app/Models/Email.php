<?php

namespace App\Models;

use App\Enums\EmailStatusEnum;
use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    use HasUuid;
    use BelongsToUser;

    protected $fillable = [
        'uuid',
        'value',
        'status',
        'user_id',
    ];

    protected $casts = [
        'status' => EmailStatusEnum::class,
    ];

    public function updateStatus(EmailStatusEnum $status): bool
    {
        if ($this->status->is($status)) {
            return false;
        }

        return $this->update(['status' => $status]);
    }
}
