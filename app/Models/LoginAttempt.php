<?php

namespace App\Models;

use App\Enums\LoginAttemptStatusEnum;
use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LoginAttempt extends Model
{
    use HasUuid;
    use BelongsToUser;

    protected $fillable = [
        'uuid',
        'user_id',
        'email',
        'remember',
        'status',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'status' => LoginAttemptStatusEnum::class,
        'remember' => 'boolean',
    ];

    public static function createFromRequest(Request $request): LoginAttempt
    {
        return (new LoginAttempt())
            ->fill([
                'email' => $request->input('email'),
                'remember' => $request->boolean('remember'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
    }
}
