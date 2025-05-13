<?php

namespace Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Homes\Models\Home;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected string $guard_name = 'web';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $visible = [
        'id',
        'name',
        'username',
        'profile_image_url',
    ];

    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'password',
        'email_verified_at',
        'role',
        'profile_image_url',
        'remember_token',
        'created_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function homes()
    {
        return $this->belongsToMany(Home::class, 'homes_users', 'user_id', 'home_id');
    }
}
