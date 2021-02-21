<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class EmployeeController extends Controller
{
    //
    public function list_role(){
      $data = Role::get();

      $response['data'] = $data;
      $response['succes'] = true;
      return $response;
    }

    public function create(Request $request){

      try {

        $insert['name_lastname'] = $request['name'];
        $insert['email'] = $request['email'];
        $insert['city'] = $request['city'];
        $insert['direction'] = $request['address'];
        $insert['phone'] = $request['phone'];
        $insert['rol'] = $request['rol'];

        Employee::insert($insert);

        $response['message'] = "Save succesful";
        $response['succes'] = true;

      } catch (\Exception $e) {
        $response['message'] = $e->getMessage();
        $response['succes'] = true;
      }

      return $response;
    }
}
