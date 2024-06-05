<?php

namespace App\Http\Controllers;

use App\Models\User_login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
    //
    public function register(){
        return view("user.register&Login.register_page");
    }
    public function register_post(Request $request){
      // Create the new user
    $user = User_login::create([
        'user_name' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Log in the newly created user
    Auth::guard('user')->login($user);

    // Get the authenticated user
    $authenticatedUser = Auth::guard('user')->user();

    // Return the username of the authenticated user
    return redirect()->route('user.page');
    
    }
    public function page(){
       $user_list =  User_Login::all();
        return view('user.register&Login.user_page',[
            'user_list'=>$user_list,
        ]);
    }
    public function data_insert(Request $request){
       
      
        $validator = Validator::make($request->all(), [
            'username'=> 'required',
            'email'=>'required',
            'password'=>'required',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $register = User_login::create([
                'user_name'=>$request->username,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);

            if($register){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Inserted Data successfully',
                    // 'name' => $request->name,
                    // 'id'=>$category->id,
                    // 'status' => $request->status
                ]);
            }
          
            
       
    else {
        // Return error message
        return response()->json([
            'status' => 'error',
            'message' => "sorry Something is wrong",
        ]);
    }
        }
            
               
    }
    public function user_logout(){
        return "hello";
    }
    public function user_edit(Request $request){
        $re = $request->all();
     if($re){
        $user = User_login::find($request->id);

        User_login::find($request->id)->update([
            'user_name'=>$request->name,
            
        ]);
        return response()->json([
            'status'=>'success',
            'user'=>$user->user_name,
          
            
       ]);
     }
    }
    public function user_delete(Request $request){
        $user = User_login::find($request->id)->delete();
        if($user){
            return response()->json([
                'status'=>'success'
            ]);
        }

    }
}
