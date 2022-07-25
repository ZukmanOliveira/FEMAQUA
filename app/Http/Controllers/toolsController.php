<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toolsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\toolsController;


class toolsController extends Controller
{
    //
    public function getAllTool() {
        // logic to get all students goes here
    
        $tool = toolsModel::get()->toJson(JSON_PRETTY_PRINT);
        return response($tool,200);

      }
  
      public function createTool(Request $request) {
        // logic to create a student record goes here
        

        $tool = new toolsModel;
        $tool->title = $request->title;
        $tool->link = $request->link;
        $tool->description =$request->description;
        $tool->tags =$request->tags;
        $tool->save();

        return response()->json([
            "message" => "tools record created"
        ], 201);
      }
  
      public function getTool(Request $request) {
        // logic to get a student record goes here
      
      
          
        $tool = toolModel::findOrFail( $tags );
        
        return response($tool,200);
          $tool = toolsModel::get('tags',$tags)->toJson(JSON_PRETTY_PRINT);
          return response($tool,200);
        }

        /*

              $tool = toolModel::where('tags', '=',"%{$request->tags}%");
        $tool = toolsModel::get()->toJson(JSON_PRETTY_PRINT);
        return response($tool,200);
        
          if (toolModel::where('tags', $tags)->exists()) {
              $tool = toolModel::where('tags', $tags)->get()->toJson(JSON_PRETTY_PRINT);
              return response($tool, 200);
            } else {
              return response()->json([
                "message" => "Student not found"
              ], 404);
            }
          }

        */
        
      
      public function updateTool(Request $request, $id) {
        // logic to update a student record goes here
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
