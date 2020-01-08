<?php

namespace App;

use App\User;
use App\Dot;
use Illuminate\Database\Eloquent\Model;



class Path extends Model
{
    protected $fillable = [
        'user_id', 'width', 'red', 'blue', 'green'
    ];
    protected $hidden = [
        'id','updated_at', 'created_at', 'user_id',
    ];
    function user(){
        return $this->belongsTo(User::class);
    }
    function dots(){
        return $this->belongsToMany(Dot::class, 'path_dots');
    }
}
