<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class tagsModel extends Model
{
    protected $table = 'tagsModel';
    protected $fillables = [
        'tags'
    ];
    
    use HasFactory;
    public function tools():belogsToMany{
        return $this->belogsToMany(toolsModel::class);
        
    }
}
