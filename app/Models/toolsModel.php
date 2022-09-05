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
        'id'
    ];

    public function tags1(){
        return $this->belongsToMany(tagsModel::class, 'toolsModel_tagsModel','toolsModel','tagsModel');
        //return $this->belongsToMany(tagsModel::class)


        ;
        
                          
                           
    }
    public function tagss(){
        
            return $this->belogsToMany(tagsModel::class,$foreignKey='id_tool',$localKey='id');
                        
    }                       

    public function toolsConsulta()
    {
        return $this->belongsTo(tagsModel::class)
                               ;
    }

    public function tagsConsulta(){
        
        $tags = tagsModel::find(1);
                         
    }
    //public function tags(){
    //    return $this->belongsToMany(tagsModel::class)
    //                ->select('tags')                  
    //                ->get() 
    //    ;  
    // }
 
    //public function tagsModel(){
    //    return $this->belogsToMany(tagsModel::class,$foreignKey='id_tool',$localKey='id');
    //    ;                           
    //}               

    public function tags(){
        return $this->hasMany(tagsModel::class,$foreignKey='id_tool',$localKey='id');        //return $this->belongsToMany(toolsModel::class, 'toolsModel_tagsModel','toolsModel','tagsModel');
        //return $this->belongsToMany(toolsModel::class)
                                             
                     ;
    }
    public function tagsModel(){
        return $this->hasMany(tagsModel::class,$foreignKey='id_tool',$localKey='id');        //return $this->belongsToMany(toolsModel::class, 'toolsModel_tagsModel','toolsModel','tagsModel');
        //return $this->belongsToMany(toolsModel::class)
                                             
                     ;
    }
}