<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Habit;

class Category extends Model
{
    public function habits()
    {
        return $this->hasMany(Habit::class);
    }
}
