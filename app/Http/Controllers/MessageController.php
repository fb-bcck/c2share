<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class MessageController extends Controller
{

    public function store(Request $request){

        $validatedData=$request->validate([
            'message'=>array('max:300','required')
        ]);

        if (Auth::check()){
            $message = new Messages();
            $message->content=$request->message;
            $message->userId=Auth::id();
            $message->created_at=NOW();
            $message->updated_at=NOW();
            $message->save();
            $request->session()->flash('alert-success','Ihre Nachricht wurde erfolgreich vermittelt');
            return redirect('home');
        }
        else{
            $message = new Messages();
            $message->content=$request->message;
            $message->userId=0; //falls kein user eingeloggt
            $message->save();
            $request->session()->flash('alert-success','Ihre Nachricht wurde erfolgreich vermittelt');
            return redirect('/');
        }
    }

    public function show(){
        $isAdmin=User::where('id',Auth::id())->pluck('isAdmin')->first();

        if($isAdmin){
            $messages=Messages::all();


            return view('messages.show')->with('messages',$messages);
        }else{
            return redirect('/');
        }



    }

    public function destroy($id, Request $request){
        DB::delete('delete from messages where id=?', [$id]);

        $request->session()->flash('alert-info','Nachricht wurde erfolgreich gelöscht');
        return redirect()->action('MessageController@show');
    }

    public function search(Request $request){

        $messages=Messages::where('content','like','%' . $request->get('searchQuest') . '%')->get();

        return json_encode($messages);
    }
}
