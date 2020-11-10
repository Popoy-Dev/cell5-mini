<?php

namespace App\Http\Controllers;
use Image;
use Auth;
use Illuminate\Http\Request;
use App\Band;
class RegisterController extends Controller
{
  public function index(){
    return view('user.register');
  }
  public function registerUpload(){
    $this->validate(request(), [
        'band_song' => 'required',
        'band_desc' => 'required',
        'band_genre' => 'required',
        'band_release' => 'required',
        'image' => 'mimes:jpeg,png,bmp,gif,svg,jpg|max:4096',
    ]);

    if ($file = request()->file('image')) {

      $name = md5($file->getClientOriginalName().time()) . "." . $file->getClientOriginalExtension();
        $file = Image::make($file)->fit(150, 150);

      if ($file->save(public_path('/image/' .$name))) {

          Band::create([
            'band_song' => request('band_song'),
            'band_code' => request('band_code'),
            'band_desc' => request('band_desc'),
            'band_genre' => request('band_genre'),
            'band_release' => request('band_release'),
            'image' => $name,
          ]);
      }
      return back()->with('success', 'Succesfully Register');
    }
  }

  public function viewRegister(){
    $id  = Auth::user()->band_id;
    $data = Band::select()->where('band_code', $id)->orderBy('band_release')->get();
    return view('user.view', compact('data'));
  }

  public function editRegister(){
    $id  = Auth::user()->band_id;
    $data = Band::select()->where('band_code', $id)->get();
    return view('user.edit', compact('data'));
  }
  public function editableRegister(Band $id){
    $data = Band::where('id', $id->id)->first();
    $this->validate(request(), [
      'band_song' => 'required',
      'band_desc' => 'required',
      'band_genre' => 'required',
      'band_release' => 'required',
      'image' => 'mimes:jpeg,png,bmp,gif,svg,jpg|max:4096',
    ]);

    if ($file = request()->file('image')){
      $name = md5($file->getClientOriginalName().time()) . "." . $file->getClientOriginalExtension();
        $file = Image::make($file)->fit(150, 150);
        if ($file->save(public_path('/image/' .$name))) {
            $data->band_song = request('band_song');
            $data->band_desc = request('band_desc');
            $data->band_genre = request('band_genre');
            $data->band_release = request('band_release');
            $data->band_code = request('band_code');
            $data->image = $name;
        }
    }else{
        $data->band_song = request('band_song');
        $data->band_desc = request('band_desc');
        $data->band_genre = request('band_genre');
        $data->band_release = request('band_release');
        $data->band_code = request('band_code');
    }
    $data->save();
    return back()->with('success', 'Edited Succesfully');
  }

  public function deleteRegister(){
    $id  = Auth::user()->band_id;
    
    $data = Band::select()->where('band_code', $id)->orderBy('is_hidden', 'asc')->get();
    return view('user.delete', compact('data'));
  }

  public function hideRegister(Band $id){
    $data = Band::where('id', $id->id)->first();
    $data->is_hidden = 0;
    $data->save();
    return response()->json(['img' => $data]);
  }
  public function unhideRegister(Band $id){
    $data = Band::where('id', $id->id)->first();
    $data->is_hidden = 1;
    $data->save();
    return response()->json(['img' => $data]);
  }
  public function searchRegister($value){
    $data = Band::where('is_hidden', 'Like', "%{$value}%")
                    ->orWhere('band_song', 'Like', "%{$value}%")
                    ->orWhere('band_desc', 'Like', "%{$value}%")
                    ->orWhere('band_genre', 'Like', "%{$value}%")
                    ->orWhere('band_release', 'Like', "%{$value}%")
                    ->orderBy('band_release')
                    ->get();
    return Response($data);
  }

}
