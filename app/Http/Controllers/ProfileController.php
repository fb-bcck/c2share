<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Inquiry;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $id=Auth::id();
        //Admin
        if(User::where('id',Auth::id())->pluck('isAdmin')->first()){
            $data=DB::select('SELECT * FROM users',[$id]);
            return view('profile/index')->with('userdata',$data);
        }else{
            $data=DB::select('SELECT * FROM users WHERE id=?',[$id]);
            return view('profile/index')->with('userdata',$data);
        }

    }

    public function edit($id,Request $request){
        if (Auth::id()==$id||User::where('id',Auth::id())->pluck('isAdmin')->first()){
            $rows = DB::select('SELECT * FROM users WHERE id=?',[$id]);
            if(count($rows)>0){

                $profile = $rows[0];
            }



            return view('/profile/edit')->with('p',$profile);
        }else{
            $request->session()->flash('alert-danger','Keine Berechtigung für diese Aktion');
            return redirect()->action('ProfileController@index');
        }

    }

    public function update(Request $request,$id){
        $validatedData=$request->validate([
            'name'=>array('required','min:3','max:20','alpha'),
            'email'=>array('required','email','min:5','max:30'),
            'telefonnr'=>array('regex:/^([0-9\s\-\+\(\)]*)$/','min:10','required'),
            'street'=>array('required','alpha','min:5','max:30'),
            'houseNo'=>array('alpha_num','min:1','max:4','required'),
            'PLZ'=>array('numeric','digits_between:5,7','required')
        ]);
        if (Auth::id()==$id||User::where('id',Auth::id())->pluck('isAdmin')->first()){
            $rows=DB::update('UPDATE users SET email=?, name=?, telefonnr=?,street=?,houseNo=?,PLZ=? WHERE id=?' ,[$request->email,$request->name,$request->telefonnr,$request->street,$request->houseNo,$request->PLZ,$id]);
            $request->session()->flash('alert-success','Daten erfolgreich aktualisiert');
            return redirect()->action('ProfileController@index');
        }
        else{
            $request->session()->flash('alert-danger','Keine Berechtigung für diese Aktion');
            return redirect()->action('ProfileController@index');
        }


    }

    public function showContact(Request $request,$id){
        $loggedInUser=Auth::id();
        if(count(Inquiry::where('ownerId',$id)->where('buyerId',$loggedInUser)->get())>0){
            $user=User::where('id',$id)->get()->first();
            $username=$user->name;
            $email=$user->email;
            $telefonnr=$user->telefonnr;
            return view('profile.contact')->with('email',$email)->with('telefonnr',$telefonnr)->with('username',$username);
        }else{
            $request->session()->flash('alert-danger','Keine bestätigte Anfrage zu diesem Benutzer vorhanden');
            return redirect()->action('InquiryController@index');
        }

    }
}
