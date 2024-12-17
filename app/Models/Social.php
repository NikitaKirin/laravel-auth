<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use BelongsToUser;
    protected $fillable = [
        'driver',
        'driver_id',
        'user_id',
    ];
}
