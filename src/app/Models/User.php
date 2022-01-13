<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_setting() {
        return $this->hasOne(\App\Models\UserSetting::class, 'user_id', 'id');
    }

    public function courses() {
        return $this->hasMany(\App\Models\Course::class, 'user_id', 'id');
    }

    public function bookmarks() {
        return $this->hasMany(\App\Models\Bookmark::class);
    }

    public function carts() {
        return $this->hasMany(\App\Models\Cart::class);
    }

    public function subscriptions() {
        return $this->hasMany(\App\Models\Subscription::class);
    }

    public function orders() {
        return $this->hasMany(\App\Models\Order::class, 'user_id', 'id');
    }

    public function tags() {
        return $this->hasMany(\App\Models\Tag::class, 'user_id', 'id');
    }

    public function categories() {
        return $this->hasMany(\App\Models\Category::class, 'user_id', 'id');
    }
}
