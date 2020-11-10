<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Http\Controllers\Redirect;
class ReportController extends Controller
{
    public function index(){
      return view('user.report.report');
    }
    public function api(){

      $data = new Register;
      $data->firstname = request('firstname');
      $data->middlename = request('middlename');
      $data->lastname = request('lastname');
      $data->age = request('age');
      $data->image = request('age');
      $data->save();
      return response()->json(["msg" =>  "Successful"], 200);

    }
}
