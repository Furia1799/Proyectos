<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function like($image_id){
        $user = Auth::user();
        
        $like =  new Like();

        $isset_like = Like::where('user_id', $user->id)->where('image_id', $image_id)->count();

        if ($isset_like == 0) {
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;
            $like->save();

            return response()->json([
                'like' => $like
            ]);

        }else{
            return response()->json([
                'message' => 'Ya existe el like'
            ]);
        }
    }

    public function dislike($image_id){
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)->where('image_id', $image_id)->first();

        if ($like) {
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike'
            ]);
        } else {
            return response()->json([
                'message' => 'No existe el like'
            ]);
        }
    }

    public function index(){
        $user = Auth::user();

        //echo $user;

        $likes = Like::where('user_id', $user->id)
            ->orderByDesc('id')
            ->paginate(5);
            

        //echo "\n";


        return view('like.index')->with('likes', $likes);
        //return redirect()->route('likes.index')->with('likes', $likes);
    }
}
