<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Leaf;
class LeafController extends Controller
{
    //
    public function createLeaf(Request $request){
      $leaf = new Leaf;
      $leaf->description = $request->input('description');
      $leaf->user_id = $request->input('user_id');
      $leaf->save();
      return "completed";
    }

    public function updateLeaf(Request $request){
      $leaf = App\Flight::find($request->input('user_id'));
      $leaf->description = $request->input('description');
      $leaf->save();
      return "completed";
    }

    public function deleteLeaf(Request $request){
      Leaf::destroy($request->input('leaf_id'));
      return "completed";
    }

    public function getAllLeaves(Request $request){
      $allLeaves = Leaf::all();
      return $allLeaves;
    }
}
