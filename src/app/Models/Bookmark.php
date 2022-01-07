<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function courses() {
        return $this->belongsToMany(\App\Models\Course::class, 'bookmark_courses');
    }
}
