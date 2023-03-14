<?php

namespace App\Http\Controllers;
use\Auth;
use\Input;
use Illuminate\Http\Request;
use App\Models\Home_model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



use\Illuminate\Foundation\Auth\Access\Authorizes\Requests;
use\Illuminate\Foundation\Auth\Access\Authorizes\Resources;
use\Illuminate\Html\Html\Service\Provider;
class Home extends Controller
{
  public function __construct()
  {

  } 
  public function index()
  {
    echo "index";
  }
  public function login()
  {
    echo "login";
  }
  // public function signup(Request $sn)
  // {
  //   $resp = array();
  //   $f_name = $sn->f_name;
  //   $l_name = $sn->l_name;
  //   $email = $sn->email;
  //   $username = $sn->username;
    
  //   $password = $sn->password;

  //   $resp["status"] = "ok";
  //   return Response::json($resp);

  // }
//   public function signup(Request $request){
//     $rules = [
//   'f_name' => 'required|string|min:3|max:255',
//   'l_name' => 'required|string|min:3|max:255',
//   'email' => 'required|string|email|max:255',
//   'username' => 'required|string|username|max:255',
//   'password' => 'required|string|password|max:255'
// ];
// $validator = Validator::make($request->all(),$rules);
// if ($validator->fails()) {
//   return redirect('home/login')
//   ->withInput()
//   ->withErrors($validator);
// }
// else{
//         $data = $request->input();
//   try{
//     $store = new Home_model;
//             $store->f_name = $data['f_name'];
//             $store->l_name = $data['l_name'];
//     $store->username = $data['username'];
//     $store->email = $data['email'];
//     $store->password = $data['password'];
//     $store->save();
//     return redirect('home/login')->with('status',"Insert successfully");
//   }
//   catch(Exception $e){
//     return redirect('home/login')->with('failed',"operation failed");
//   }
// }
// }
public function signup($f_name,$l_name,$email,$password,$username)
    {
        $data = new Home_model();
        $data->f_name = $f_name;
        $data->l_name = $l_name;
        $data->email = $email;
        $data->username = $username;
        $data->password = $password;
        $data->save();
        // return response()->json($data);
        return 'success';
    }
    public
  function doLogin()
    {
    // Creating Rules for Email and Password
    $rules = array(
      'username' => 'required|username', // make sure the email is an actual email
      'password' => 'required|alphaNum|min:8'
      // password has to be greater than 3 characters and can only be alphanumeric and);
      // checking all field
      $validator = Validator::make(Input::all() , $rules);
      // if the validator fails, redirect back to the form
      if ($validator->fails())
        {
        return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {
        // create our user data for the authentication
        $userdata = array(
          'username' => Input::get('username') ,
          'password' => Input::get('password')
        );
        // attempt to do the login
        if (Auth::attempt($userdata))
          {
          // validation successful
          // do whatever you want on success
          }
          else
          {
          // validation not successful, send back to form
          return Redirect::to('checklogin');
          }
        }
      }
}

