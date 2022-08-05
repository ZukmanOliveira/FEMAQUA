<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toolsModel;
use App\Models\tagsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\toolsController;


class toolsController extends Controller
{
    //
    public function createTool(Request $request) {
      //trabalhando com tools
        $tool = new toolsModel();
        $tool->title = $request->title;
        $tool->link = $request->link;
        $tool->description = $request->description;
        $tool->save();
        
        $tags = new tagsModel();
        $tags->tags = $request->tags;
        $tags->id_tool = $tool->id;
          foreach($request->tags as $value){
            $tags = new tagsModel();
            $tags->tags = $value;
            $tags->id_tool = $tool->id;
            $tags->save();
         } 
            $tags->save();      
      //trabalhando com tags
         foreach($tags as $tag){
            $tags = new tagsModel();
            $tags->tags = $tag;
            $tool->tags = $request->tags;
            $tool->tags()->save($tags);
        }
         
        //$tools = $tool->with('tags');
        //$tools = toolsModel::get()->toJson(JSON_PRETTY_PRINT);
        return response($tool,200); 
      }        


    //CONSULTA COMPLETA 
     public function getAllTool(Request $request) {
    //logic to get all students goes here 
    
    
        $tool = new toolsModel();
        $tool->value   = $request->id;
        $tool->title= $request->title;
        $tool->link = $request->link;
        $tool->description = $request->description;
        $tool->tags = $request->tags;
     
     
     $tool=toolsModel::with('tags')->get();
    
       // return response($tool,200);
     return response($tool,200);
     }
    
   // FILTRO POR TAGS
      public function getTool(Request $request) {
            $tool = new toolsModel();
            $tags = $request->tags;   
            $tool ->tags = $request->tags;
        
         
       
          $tool = tagsModel::find($tags);
          
          
          return response($tool);
     
          
      
      }
      public function deleteTool ($id) {
        // logic to delete a student record goes here
         if(toolsModel::where('id', $id)->exists()) {
           $tool = toolsModel::find($id);
           $tool->delete();
   
           return response()->json([
             "message" => "records deleted"
           ], 202);
         } else {
           return response()->json([
             "message" => "Student not found"
           ], 404);
         }     
       }
}
