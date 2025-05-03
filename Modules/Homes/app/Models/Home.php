<?php

namespace Modules\Homes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';
    protected string $guard_name = 'web';

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
}
