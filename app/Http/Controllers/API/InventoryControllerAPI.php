<?php


namespace App\Http\Controllers\API;


use App\Models\Logs;
use App\Models\User;
use App\Models\Inventory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InventoryControllerAPI extends Controller
{
    public function login()
    {
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();

            $success['token'] = Str::random(64);
            $success['name'] = $user->name;
            $success['username'] = $user->username;
            $success['id'] = $user->id;

            $user->remember_token = $success['token'];
            $user->save();

            $logs = new Logs;

            $logs->userid = $user->id;
            $logs->log = "Login";
            $logs->logdetails = "User $user->name has logged into my system";
            $logs->logtype = "API login";
            $logs->save();

            return response()->json($success,200);

        }else{
            return response()->json($success,404);
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['response' => $validator->errors()],401);
        }else{
            $input = $request->all();

            if(User::where('email',$input['email'])->exists()){
                return response()->json(['response' => 'Email already exists'], 401);
            }elseif(User::where('username',$input['username']->exists())){
                return response()->json(['response' => 'Username already exists'],401);
            }else{
                $input['passwor'] = bcrypt($input['password']);
                $user = User::create($input);


                $success['token'] = Str::random(64);
                $success['name'] = $user->name;
                $success['username'] = $user->username;
                $success['id'] = $user->id;

                return response()->json($success,200);

            }

        }
    }
    public function resetPassword(Request $request)
    {
        $user = User::where('emai', $request['email']->first());

        if($user != null){

            $user->password = bcrypt($request['password']);
            $user->save();


            return response()->json(['response' => 'User has successfully resetted his/her password'],200);
        }else{
            return response()->json(['reponse'=>'User not found'],404);
        }
    }
}
