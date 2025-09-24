<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseModel extends Model
{
    /** @use HasFactory<\Database\Factories\ExercisesFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'muscle_group',
        'cover_image',
        'video_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
