<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;

class UserRole extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'role_id',
        'granted_at',
    ];

    public function userRole(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}
