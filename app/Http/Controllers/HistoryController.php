<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\User;
use Illuminate\Support\Facades\Auth;
class HistoryController extends Controller {

    public function index(){
        $id=Auth::id();

        if(User::where('id',Auth::id())->pluck('isAdmin')->first()){
           // $nutzer=User::all();
            $rows=History::all();
            return view('history/index')->with('history',$rows);
        }else{
           // $nutzer=User::all();
            $rowsBuyer=History::where('buyerId',$id)->get();
            $rowsSeller=History::where('sellerId',$id)->get();

            return view('history/index')->with('historyBuyer',$rowsBuyer)->with('historySeller',$rowsSeller);
        };

}
    //
}
