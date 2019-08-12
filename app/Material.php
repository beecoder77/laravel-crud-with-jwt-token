<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'thumbnail', 'title', 'content'
    ];
}
