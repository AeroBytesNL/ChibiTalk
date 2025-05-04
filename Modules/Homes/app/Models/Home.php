<?php

namespace Modules\Homes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Models\User;
use Modules\Homes\Models\Channel;
use Modules\Homes\Models\Message;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';
    protected string $guard_name = 'web';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'home_id',
        'name',
        'description',
        'icon_url',
        'owner_id',
        'created_at',
        'updated_at',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function channels()
    {
        return $this->hasMany(Channel::class, 'home_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'homes_users', 'home_id', 'user_id')
            ->withTimestamps();
    }
}
