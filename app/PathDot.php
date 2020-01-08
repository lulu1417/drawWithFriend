<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PathDot extends Model
{
    protected $fillable = [
        'path_id', 'dot_id',
    ];
    protected $hidden = [
        'id', 'updated_at', 'created_at', 'pivot'
    ];
}
