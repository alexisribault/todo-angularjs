<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = array('title', 'done');

    public function getDoneAttribute($value)
    {
        return (bool) $value;
    }
}
