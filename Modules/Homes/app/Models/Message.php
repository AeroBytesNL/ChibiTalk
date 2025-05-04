<?php

namespace Modules\Homes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $table = 'homes_messages';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'home_id',
        'channel_id',
        'user_id',
        'content',
        'attachments',
        'created_at',
        'updated_at',
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
