<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'professors';
    protected $fillable = [
        'user_id',
        'name',
        'id_card',
        'gender',
        'country',
        'city',
        'date_of_birth',
        'phone_number',
        'email_address',
        'experience',
        'LinkedIn',
        'photo',
        'slug',
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'user_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
