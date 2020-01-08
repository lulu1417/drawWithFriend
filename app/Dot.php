<?php

namespace App;

use App\Path;
use Illuminate\Database\Eloquent\Model;

class Dot extends Model
{
    protected $fillable = [
        'x_axis', 'y_axis'
    ];
    protected $hidden = [
        'id', 'updated_at', 'created_at', 'pivot'
    ];
}
