<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SessionUser;
//use Validator;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RequestPassword;
use App\Http\Resources\User as UserResource;
use Hash;

class AuthController extends Controller
{
    
    
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','getUser','getAuthLogin','showData','showDataLevel','updateLevel','changePass','saveUpdatePass','logout','getLoginUser','updateUser']]);
    }

    public function getUser(){
        $user = Auth::user();
        $level = $user['level'];
        $listuser = User::all()->where('level','<',$level);
        return $listuser;
    }


    public function getAuthLogin() {
        return view('form'); 
    }

    function showData($id){
        $data = User::find($id);
        return $data;
        //return Auth::user()->password;
    }

    function getLoginUser(){ 
        return Auth::user();
    }

    /* function showDataLevel($id){
        $data = User::find($id);
        return $data;
    } */

    /* public function updateLevel(Request $request, $id){ */

       /*  $request->validate([
            'name' =>'required',
            'level' => 'required',
            
        ]); */
        
        /* $data = User::findOrFail($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->level=$request->level;
        $data->save();
        return response()->json(['data' => 'User update!']);
        
    } */

    public function updateUser(Request $request){
        $user = Auth::user();
        $level = $user['level'];
        $request->validate([
             'name' =>'required',
             'email' =>'required',
             'level' => 'required|integer|min:1|max:'.$level,
         ]);
         
         $data = User::find($request->id);
         $data->id=$request->id;
         $data->name=$request->name;
         $data->email=$request->email;
         $data->level=$request->level;
         $data->save();
         return response()->json(['data' => 'User update!']);
         
     }

    function changePass(){
        return view('changepass');
    }

    public function saveUpdatePass(Request $request){
        $this->validate(request(),[
            'old_password'=>'required|min:6|max:100',
            'new_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password'
            ]);

        $current_user=Auth::user();
        if(Hash::check($request->old_password,$current_user->password)){
            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            //return redirect('/api/authLogin')->with('success','Password successfully updated.');
            return response()->json(['data' => 'User update password success!']);
        }else{
            //return redirect('/api/changePass')->with('error','Old password does not matched.');
            return response()->json(['data' => 'Old password does not matched.'],401);
        }
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required',
            'password' =>'required|min:6|max:100',
        ]);
        //Xác thực user có tk chưa
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials) || session()->has('user') ){ 
            
            $checkTokenExit = SessionUser::where('user_id', auth()->id())->first();

            if(empty($checkTokenExit)){
                 // Authentication passed...
                $userSession=SessionUser::create([
                'token'=>Str::random(40),
                'refresh_token'=>Str::random(40),
                'token_expried'=>date('Y-m-d H:i:s', strtotime('+30 day')),
                'refresh_token_expried'=>date('Y-m-d H:i:s', strtotime('+360 day')),
                'user_id'=>auth()->id(),
            ]);
            }else{
                $userSession = $checkTokenExit;
            }

            $request->session()->put('user', Auth::user());
            //$userss= $request->session()->get('user');
            //$level = $userss['level'];
            return Auth::user(); 
            //return $this->getUser($level);
            //return view('formuser',['user'=>$this->getUser($level)],['user_login'=>Auth::user()]);
             
        } else {
            return response()->json(['error' => 'Login failed'], 401);
        }
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level'=> 'required',
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'level'=>$request->level,
        ]);
        $user->save();
        return response()->json(['code'=> 201 , 'data'=>$user],201);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        //forget,flush
        session()->pull('user');
        return response()->json(['data' => 'Logout success!']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()

        ]);
    }

}
