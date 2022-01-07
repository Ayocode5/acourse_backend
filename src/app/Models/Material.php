<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at'];

    public function course() {
        return $this->belongsTo(\App\Models\Course::class, 'course_id','id');
    }
}
