<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tagsModel;
class toolsModel extends Model
{   
    
    protected $table = 'toolsModel';
    protected $fillable = [
        'title',
        'link',
        'description',
        'tags',
        'id_tool',
        'id'
        
    ];
    protected $guarded = [
        'id_tool'
    ];

    public function tools(){
        //return $this->belongsToMany(tagsModel::class, 'toolsModel_tagsModel','toolsModel','tagsModel');
        //return $this->belogsToMany(tagsModel::class)
    }
    public function tags(){
        
            return $this->hasMany(tagsModel::class,$foreignKey='id_tool',$localKey='id');
    }
    public function tagsCosulta()
    {
        return $this->belongsTo('App\Models\tagsModel');
    }

}