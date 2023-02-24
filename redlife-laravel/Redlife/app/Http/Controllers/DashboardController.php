<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){

        //$images = Image::all();
        //$images = Image::orderByDesc('id')->get();
        $images = Image::orderByDesc('id')->paginate(5);

        return view('dashboard')->with('images',$images)->with('mensaje','hola');
    }
}
