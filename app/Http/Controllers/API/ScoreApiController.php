<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Response;


class ScoreApiController extends Controller
{
    public function getScore(){
     \DB::statement("SET SQL_MODE=''");  // solve access voilation error if you got it, by this query
   
    $scores = User::leftJoin('score', 'score.user_id', '=', 'users.id')->groupBy('score.user_id')->select('users.*','score.user_id', DB::raw('sum(score.score) as total_score'))->orderBy('total_score')->get();
  
     // now set all records in array using according to format 
     $leader_board =[];
     $data=[];
     foreach ($scores as $key => $score) {
        $data['id'] =$score->id;
        $data['user_id'] =$score->user_id;
        $data['created_at'] =$score->created_at;
        $data['updated_at'] =$score->updated_at;
        $data['total_score'] =$score->total_score;
        $data['user'] = array('id' => $score->id, 'name'=>$score->name);
        $leader_board[]=$data;
     }
        return response()->json(['success'=>true,"leaderboard" => $leader_board]); 
    }
}

// {
//   "success": true,
//   "leaderboard": [
//     {
//       "id": 20,
//       "user_id": 100,
//       "created_at": "2022-01-03T07:01:00.000000Z",
//       "updated_at": "2022-01-03T07:01:00.000000Z",
//       "total_score": "10050",
//       "user": {
//         "id": 3355,
//         "name": "Vikas Kapadiya"
//       }
//     },