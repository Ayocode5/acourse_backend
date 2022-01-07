<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function owner() {
        return $this->belongsTo(\App\Models\User::class, 'owner_id', 'id');
    }

    public function payment() {
        return $this->hasOne(\App\Models\Payment::class, 'order_id', 'id');
    }

    public function course() {
        return $this->belongsTo(\App\Models\Course::class, 'course_id', 'id');
    }
}
