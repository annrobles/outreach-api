<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Company extends Model
{
    public $table = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'about',
        'link',
        'email',
        'contact_number',
        'availability',
        'status',
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
