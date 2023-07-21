<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Library extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'libraries';
    protected $fillable = [
        'user_id',
        'name',
        'book_code',
        'type',
        'description',
        'author',
        'photo',
        'slug',
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
