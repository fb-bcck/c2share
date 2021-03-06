<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id,Request $request)
    {
        if(Auth::id()==$id||User::where('id',Auth::id())->pluck('isAdmin')->first()){
            return view('auth.passwords.change')->with($id);
        }else{

            return redirect()->action('ProfileController@index');
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        $request->session()->flash('alert-success','Passwort erfolgreich geändert');
        return redirect()->action('ProfileController@index');
    }
}
