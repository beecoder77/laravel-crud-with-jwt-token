<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;

class Material extends Model
{
    use UuidTrait;
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $fillable = [
        'thumbnail', 'title', 'content'
    ];
}
