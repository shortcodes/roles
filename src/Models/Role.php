<?php

namespace Shortcodes\Roles\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = mb_strtolower($name);
    }
}
