<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class tagsModel extends Model
{
    protected $table = 'tagsModel';
    protected $fillables = ['tags','id_tool'];
    protected $primaryKey = 'id_tool';
    protected $guarded = ['id_tool'];
    use HasFactory;
    public function tags(){
        return $this->hasOne(tagsModel::class,$foreignKey='id_tool',$localKey='id');        //return $this->belongsToMany(toolsModel::class, 'toolsModel_tagsModel','toolsModel','tagsModel');
        //return $this->belongsToMany(toolsModel::class)
                                             
                     ;
    }
    public function tagsCosulta()
    {
        return $this->belongsTo(tagsModel::class);
    }
    public function tagsFormato(){
        
    }
    public function toolsModel(){
        return $this->belongsToMany(toolsModel::class);
    }
   // public function tags(){
   //      return $this->belongsToMany(toolsModel::class);
   // }

}
