<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Habit;

class HabitLog extends Model
{
    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
