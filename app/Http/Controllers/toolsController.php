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
     public function getAllTool() {
        // logic to get all students goes here

        $tool = toolsModel::get()->toJson(JSON_PRETTY_PRINT);
        return response($tool,200);
        $tags = toolsTags::get()->toJson(JSON_PRETTY_PRINT);
        return response($tags,200);
      }

        
      public function createTool(Request $request) {
        // logic to create a student record goes here
        $tool = new toolsModel;
        $tool->title = $request->title;
        $tool->link = $request->link;
        $tool->description =$request->description;
        //$tool->tag=$request->tag;
        //$tool->save();
        $tags = new tagsModel;  
        //$tags = tagsModel::all();
        $tags->tags =$request->tags;
       /* $tags->tags = $request->tags;
        $tags->save();
        $tool->tag =$request->tag;
        $tool->with('tag');
      */
      
       // $tool = toolsModel::get()->toJson(JSON_PRETTY_PRINT);
       //   return response($tool,200);
        $tags = tagsModel::get()->toJson(JSON_PRETTY_PRINT);
          return response($tags,200);
          return response()->json([
            "message" => "tools record created"
        ], 201);
        

      }

      public function getTool( $tags) {
        
        $tags = tagsModel::where('tags',$tags)->first();
        return response($tags,200);
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
