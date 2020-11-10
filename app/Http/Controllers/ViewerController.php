<?php

namespace App\Http\Controllers;
use App\Band;
use App\User;


use Illuminate\Http\Request;

class ViewerController extends Controller
{
  public function index(){
    $data = Band::select()->orderBy('band_release')->get();
    return view('viewer.view', compact('data'));
  }
  public function viewBands(){

    $data = Band::select('band_code')->distinct()->get();
    return view('viewer.bands', compact('data'));
  }
  public function songBands($id){
    $song = Band::where('band_code', $id)->get();
    return view('viewer.song', compact('song'));
  }
  public function viewGenre(){
    $data = Band::select('band_genre')->distinct()->get();
    return view('viewer.genre', compact('data'));
  }
  public function genreList($id){
    $song = Band::where('band_genre', $id)->get();
    return view('viewer.genres', compact('song'));
  }
  public function searchSong($value){
    $data = Band::Where('band_song', 'Like', "%{$value}%")
    ->orWhere('band_desc', 'Like', "%{$value}%")
    ->orWhere('band_genre', 'Like', "%{$value}%")
    ->orWhere('band_release', 'Like', "%{$value}%")
    ->orderBy('band_release')
    ->get();
    return Response($data);
  }
}
