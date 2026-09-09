<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\HabitLog;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\FrequencyType;
use App\Enums\HabitType;
use App\Enums\HabitStatus;

class Habit extends Model
{

    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'frequency_type' => FrequencyType::class,
            'habit_type' => HabitType::class,
            'habit_status' => HabitStatus::class,
            'start_date' => 'date',
            'target_value' => 'decimal:2',
        ];
    }

    protected $fillable = ["name", "start_date", "frequency_type", "frequency_target", "habit_type", "target_value", "unit", "habit_status", "description", "user_id", "category_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function logs()
    {
        return $this->hasMany(HabitLog::class);
    }
}
