<?php

namespace App\Http\Controllers;

use App\Models\User_login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    return response()->json(['username' => $authenticatedUser->user_name]);
    
    }
    public function page(){
       $user_list =  User_Login::all();
        return view('user.register&Login.user_page',[
            'user_list'=>$user_list,
        ]);
    }
    public function data_insert(Request $request){
        try {
            // $request->validate([
            //     'name' => 'required|string|max:255|unique:category_models,name',
            //     'status'=>'required'
               
            // ]);
            
                $register = User_login::create([
                    'user_name'=>$request->username,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                ]);
              
                
            return response()->json([
                'status' => 'success',
                'message' => 'Inserted Data successfully',
                // 'name' => $request->name,
                // 'id'=>$category->id,
                // 'status' => $request->status
            ]);
        } catch (\Exception $e) {
            // Return error message
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
