<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Habit;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $fillable = ["name", "user_id"];

    public function habits()
    {
        return $this->hasMany(Habit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
