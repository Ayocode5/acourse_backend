<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Course extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'deleted_at'];

    /*
     *  This Course belongs to Users
     *  [One 'user' To Many 'course' Relations]
     */
    public function user(): belongsTo {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /*
     *  One course obviously could have more than one materials 
     */
    public function materials(): HasMany {
        return $this->hasMany(\App\Models\Material::class, 'course_id', 'id');
    }

    /*
     *  
     */
    public function bookmarks(): BelongsToMany {
        return $this->belongsToMany(\App\Models\Bookmark::class, 'bookmark_courses');
    }

    /*
    */
    public function tags() {
        return $this->belongsToMany(\App\Models\Tag::class, 'course_tags');
    }

    /** */
    public function categories() {
        return $this->belongsToMany(\App\Models\Category::class, 'course_categories');
    }

    public function carts() {
        return $this->belongsToMany(\App\Models\Cart::class, 'cart_courses');
    }

    public function subscriptions() {
        return $this->hasMany(\App\Models\Subscription::class);
    }

    public function orders() {
        return $this->hasOne(\App\Models\Order::class, 'course_id', 'id');
    }
}
