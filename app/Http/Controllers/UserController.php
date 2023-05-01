<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewUser($id)
    {
        $User = User::where('id','=',$id)->first();
        $GameAccounts = DB::table('game_accounts')
        ->select('*','types.name as GameName','game_accounts.name as name')
        ->join('game_types','game_accounts.GameAccountID','=','game_types.GameAccountID')
        ->join('types','game_types.GameType','=','types.TypeID')
        ->where(['game_accounts.UserID' => $id])
        ->paginate(12);

        return view('view_user', ['user' => $User, 'gameAccounts' => $GameAccounts]);
    }

    public function login(Request $request){
        $credenial = $request->validate([
            'email'=>'required|email',
            'password' => 'required|min:8|max:20'
        ]);
        if (!Auth::attempt($credenial, $request->input('remember'))){
            return redirect()->back()->withErrors('Invalid Credential');
        }
        return redirect()->route('Home Page');
    }

    public function index_login(){
        return view('auth.login');
    }

    public function index_register(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required|min:8|max:20',
            'confirm' => 'required|same:password',
            'terms' => 'required'
        ]);

        $newUser = new User();
        $newUser->Name = $request->name;
        $newUser->Email=$request->email;
        $newUser->Password=Hash::make($request->password);
        $newUser->Role = 'Member';
        $newUser->save();

        return redirect()->route('index_login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index_login');
    }


}

