<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toolsModel;
use App\Models\tagsModel;
use App\Http\Controllers\Controller;




class toolsController extends Controller
{

  /**
   * Create tool
   * @OA\Post (
   *     path="/api/tool/tools",
   *     tags={"Tools"},
   *     @OA\RequestBody(
   *         @OA\MediaType(
   *             mediaType="application/json",
   *             @OA\Schema(
   *                 @OA\Property(
   *                      type="object",
   *                      @OA\Property(
   *                          property="title",
   *                          type="string"
   *                      ),
   *                      @OA\Property(
   *                          property="link",
   *                          type="string"
   *                      ),
   *                      @OA\Property(
   *                          property="description",
   *                          type="string"
   *                      ),
   *                       @OA\Property(
   *                          property="tags",
   *                          type= "string"
   *                      )
   *                 ),
   *                
   *             )
   *         )
   *      ),
   *      @OA\Response(
   *          response=200,
   *          description="success",
   *        
   *      ),
   *      
   * )
   */
  public function createTool(Request $request)
  {
    //lógica para criar ferramenta
    $tool = new toolsModel();
    $tool->title = $request->title;
    $tool->link = $request->link;
    $tool->description = $request->description;
    $tool->save();

    $tags = new tagsModel();
    $tags->tags = $request->tags;
    $tags->id_tool = $tool->id;
    foreach ($request->tags as $value) {
      $tags = new tagsModel();
      $tags->tags = $value;
      $tags->id_tool = $tool->id;
      $tags->save();
    }
    $tags->save();
    $tool->tags = $request->tags;
    //trabalhando com tags
    foreach ($tags as $tag) {
      $tags = new tagsModel();
      $tags->tags = $tag;
    }


    return response($tool, 200);
  }

  /**
   * Get List Tools
   * @OA\Get (
   *     path="/api/tool/tools",
   *     tags={"Tools"},
   *     @OA\Response(
   *         response=200,
   *         description="success",
   *         @OA\JsonContent(
   *             )
   *         )
   *     )
   * 
   */
  public function getAllTool(Request $request)
  {
    //lógica para consultar todas as ferramentas
    $tools = toolsModel::with('tags')->get();
    return response($tools, 200);
  }
  // FILTRO POR TAGS//
  /**
   * Get Detail Todo
   * @OA\Get (
   *     path="/api/tool/tools/{tags}",
   *     tags={"Tools"},
   *     @OA\Parameter(
   *         in="path",
   *         name="tags",
   *         required=true,
   *         @OA\Schema(type="string")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="success",
   *        
   *     )
   * )
   */
  public function getTool(Request $request, $tags)
  // lógica para filtrar ferramenta por tags
  {
    $tool = new toolsModel();
    $tag = new toolsModel();

    foreach ($tool as $tools) {
      $tools = tagsModel::firstWhere('tags', $tags);

      $tool->id   = $tools->id_tool;
      $tool->tags = $tools->tags;
      $tools->tags = $tools->tags;

      $tools = toolsModel::find($tool);
    }

    foreach ($tools as $tag) {
      $tools = tagsModel::firstWhere('tags', $tags);
      $tag->tags;
    }
    return response($tag, 200);
  }

  /**
   * Delete tool
   * @OA\Delete (
   *     path="/api/tool/tools/{id}",
   *     tags={"Tools"},
   *     @OA\Parameter(
   *         in="path",
   *         name="id",
   *         required=true,
   *         @OA\Schema(type="string")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="success",
   *         @OA\JsonContent(
   *             @OA\Property(property="msg", type="string", example="delete todo success")
   *         )
   *     )
   * )
   */
  public function deleteTool($id)
  {
    // lógica para excluir uma ferramenta por id
    if (toolsModel::where('id', $id)->exists()) {
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
