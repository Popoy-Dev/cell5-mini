<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BandController extends Controller
{
  public function index(){
    return view('superadmin.band.add');
  }
  public function bandAdd(){
    $this->validate(request(), [
        'band_id' => 'required',
        'band_name' => 'required',
        'band_scope' => 'required',
        'email' => 'required',
        'password' => 'required',
      ]);
    $data =   User::create([
        'band_id' => request('band_id'),
        'band_name' => request('band_name'),
        'band_scope' => request('band_scope'),
        'email' => request('email'),
        'password' => Hash::make(request('password')),
      ]);
      return back()->with('success', 'Band Account Succesfully Added!');
  }
  public function viewBand(){
    $data = User::where('is_deleted', 0)->get();
    return view('superadmin.band.view', compact('data'));
  }
  public function editBand(){
    $data = User::where('is_deleted', 0)->get();
    return view('superadmin.band.edit', compact('data'));
  }
  public function editableBand(User $id){
    $data = User::where('id', $id->id)->first();

    $this->validate(request(), [
      'band_id' => 'required',
      'band_name' => 'required',
      'band_scope' => 'required',
      'email' => 'required',
      'password' => 'required',
    ]);
    $data->band_id = request('band_id');
    $data->band_name = request('band_name');
    $data->band_scope = request('band_scope');
    $data->email = request('email');
    $data->password = Hash::make(request('password'));
    $data->save();
    return back()->with('success', 'Band Account Succesfully Edited!');
  }
  public function deleteBand(){
      $data = User::select()->orderBy('is_deleted', 'asc')->paginate(2);
      return view('superadmin.band.delete', compact('data'));
  }

  public function hideBand(User $id){
    $data = User::where('id', $id->id)->first();
    $data->is_deleted = 0;
    $data->save();
    return response()->json(['msg' => $data]);
  }
  public function unhideBand(User $id){
    $data = User::where('id', $id->id)->first();
    $data->is_deleted = 1;
    $data->save();
    // return back()->with('leads', json_decode($data, true));
    return response()->json(['msg' => $data]);
  }

}
