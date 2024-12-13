<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_otpdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp_email',
        'user_email',
        'user_mob',
        'otp_mob',
    ];
}
