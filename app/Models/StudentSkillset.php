<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSkillset extends Model
{
    public $table = 'student_skillset';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'skillset_id',
        'total_years_experience'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function skill()
    {
        return $this->hasOne(Skillset::class,'id', 'skillset_id');
    }

}
