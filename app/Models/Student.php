<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'students';
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
        'supervising_professor_id',
        'teaching_assistant_for_course_id',
        'photo',
        'slug',
    ];

  /*  public function user(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'user_id');
    }
    */

   /*
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Course', 'course_student');
    }

    */

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function courseAsTA()
    {
        return $this->hasOne(Course::class, 'teaching_assistant_id');
    }

    public function supervisingProfessor()
    {
        return $this->belongsTo(Professor::class, 'supervising_professor_id');
    }

    public function libraries()
    {
        return $this->hasMany(Library::class);
    }


}
