<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        return view('Image.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $validate = $this->validate($request,[
            'image_path' => 'required|image',
            'description' => 'required'
        ]);

        //get request
        $image_path = $request->file('image_path');
        $description = $request->input('description');
        //create Model Object
        $image = new Image();
        //set object
        $user = Auth::user();
        
        $image->user_id = $user->id;
        $image->description = $description;
        //get image
        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();

            Storage::disk('images')->put($image_path_name,File::get($image_path));

            $image->image_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('dashboard')->with('message', 'The photo has been uploaded successfully :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        $image = Image::find($id);

        if($user && $image && $user->id == $image->user->id){
            return view('image.edit', ['image' => $image]);
            //image/{image}/edit
        }else{
            return redirect()->route('dashboard');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        //validacion

        $image_id = $request->input('image_id');
        $description = $request->input('description');
        $image_path = $request->file('image_path');

        //buscar el objeto imagen
        $image = Image::find($image_id);
        $image->description = $description;

        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();

            Storage::disk('images')->put($image_path_name, File::get($image_path));

            $image->image_path = $image_path_name;
        }

        //actualizar 
        $image->update();

        return redirect()->route('image.detail', ['id' => $image->id])->with('message', 'Se a actualizado correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar imagen 
        $user = Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

    

        //
        if($user && $image && $user->id == $image->user_id){
            //eliminar comentarios 
            if($comments && count($comments) >= 1){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }

            //eliminar likes
            if ($likes && count($likes) >= 1) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            //eliminar sorage
            Storage::disk('images')->delete($image->image_path);
             
            //eliminar imagen
            $image->delete();

            $message = "La imagen se a borrado";

        }else{
            $message = "Se produjo un error al eliminar imagen";
        }

        return redirect()->route('dashboard')->with($message);

    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file,200);
    }

    public function detailImage($id){
        $image = Image::find($id);

        return view('image.detail')->with('image',$image);
    }
}
