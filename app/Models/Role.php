<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'role_name',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}