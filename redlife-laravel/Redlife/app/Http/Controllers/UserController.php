<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all friends
        //->orderByDesc('arrived_at')
        $users = User::orderByDesc('id')->paginate(5);

        return view('user.index', ['users' => $users]);
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
        //
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
        return view('user.config')->with('id',$id);
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
        //conseguir usuario identificado 
        $user = Auth::user();

        //validacion de formulario
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,'.$id],//367
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);
        
        //recoger valores del formulario
        $id = $user->id;
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $nick = $request->input('nick');
        $email = $request->input('email');
        
        //asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->last_name = $last_name;
        $user->nick = $nick;
        $user->email = $email;

        //subir foto
        $image_path = $request->file('image_path');
        if ($image_path) {
            //nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();

            //guardar en disco
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            //guardar en bd
            $user->image = $image_path_name;
        }

        //ejecutar consulta y cambios en la bd
        $user->save();

        return redirect()->route('config')->with('message','Update User');
        //echo $email;
        //die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Config
    public function config()
    {
        return view('user.config');
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);

    }

    #getOnlyProfile
    public function profile($id){
        $user = User::find($id);

        return view('user.profile')->with('user', $user);

    }

    #search users
    public function searchUser(Request $request){
        $search = $request->input('search');
        
        $users = User::where('nick', 'LIKE', '%'.$search.'%')
                        ->orwhere('name', 'LIKE', '%'.$search.'%')
                        ->orwhere('last_name', 'LIKE', '%' . $search . '%')
                        ->orderByDesc('id')
                        ->paginate(5);

        return view('user.index', ['users' => $users]);
    }

    
}
