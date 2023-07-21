<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'courses';
    protected $fillable = [
        'user_id',
        'name',
        'category',
        'hours',
        'price',
        'description',
        'prof_id',
        'teaching_assistant_id',
        'photo',
        'slug',
    ];

   /* public function user(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'user_id');
    }
    */

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
