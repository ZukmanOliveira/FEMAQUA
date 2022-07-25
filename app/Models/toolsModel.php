<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toolsModel extends Model
{
    protected $table = 'toolsModel';
    protected $fillables = [
        'title',
        'link',
        'description',
        'tags',
    ];

}
