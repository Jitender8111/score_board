<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Response;
use Illuminate\Database\Eloquent\Builder;


class ScoreApiController extends Controller
{
    public function getScore(){
     \DB::statement("SET SQL_MODE=''");

     $leader_board = Score::select('id','user_id','created_at','updated_at',DB::raw('SUM(score) as total_score'))->with('user')->groupBy('user_id')->get();
        
      return response()->json(['success'=>true,"leaderboard" => $leader_board]); 
    }
}















/* api old code using left join */

 //  \DB::statement("SET SQL_MODE=''");
// $scores = User::leftJoin('score', 'score.user_id', '=', 'users.id')->groupBy('score.user_id')->select('users.*','score.user_id','score.id', DB::raw('sum(score.score) as total_score'))->orderBy('total_score')->get();
  
//      // now set all records in array using according to format 
//      $leader_board =[];
//      $data=[];
//      foreach ($scores as $key => $score) {
//         $data['id'] =$score->id;
//         $data['user_id'] =$score->user_id;
//         $data['created_at'] =$score->created_at;
//         $data['updated_at'] =$score->updated_at;
//         $data['total_score'] =$score->total_score;
//         $data['user'] = array('id' => $score->user_id, 'name'=>$score->name);
//         $leader_board[]=$data;
//      }


