<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlans extends Model
{

    use HasFactory;
    protected $table = 'workout_plans';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
