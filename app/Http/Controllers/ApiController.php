<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Band;

class ApiController extends Controller
{
  public function hideRegister(Band $id){
    $data = Band::where('id', $id->id)->first();
    $data->is_hidden = 0;
    $data->save();
    return response()->json(["msg" =>  "Successful"], 200);

  }
  public function unhideRegister(Band $id){
    $data = Band::where('id', $id->id)->first();
    $data->is_hidden = 1;
    $data->save();

    return response()->json(["msg" =>  "Successful"], 200);

  }

}
