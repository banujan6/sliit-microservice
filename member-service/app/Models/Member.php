<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'nic',
        'email',
        'address',
        'expire_on',
        'created_at',
        'updated_at',
    ];
}
