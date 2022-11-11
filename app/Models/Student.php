<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public $table = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'contact_number',
        'email',
        'link',
        'about'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function skillsets()
    {
        return $this->hasMany(StudentSkillset::class);
    }
}
