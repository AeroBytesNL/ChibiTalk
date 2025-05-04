<?php

namespace Modules\Homes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Homes\Models\Home;
class Channel extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'type',
        'is_public',
        'home_id',
        'channel_id',
        'created_at',
    ];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }

    public function parent()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function children()
    {
        return $this->hasMany(Channel::class, 'channel_id');
    }

}
