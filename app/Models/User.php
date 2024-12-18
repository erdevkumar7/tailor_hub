<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'email_id',
        'mobile_number',
        'password',
        'user_address',
        'user_city',
        'user_states',
        'user_zipcode',
        'user_country',
        'user_facebook',
        'user_youtube',
        'user_twitter',
        'device_id',
        'device_type',
        'is_social',
        'user_status',
        'is_deleted',
    ];

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'customer_id');
    }
}
