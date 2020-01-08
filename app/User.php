<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'id','name'
    ];
    protected $hidden = [
        'updated_at', 'created_at'
    ];
}
