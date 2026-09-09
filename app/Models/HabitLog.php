<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Habit;

class HabitLog extends Model
{
    protected $fillable = ["date", "value", "habit_id", "completed", "notes"];

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'value' => 'decimal:2',
            'completed' => 'boolean',
        ];
    }
}
