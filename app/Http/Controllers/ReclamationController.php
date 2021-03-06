<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Reclamation;
use App\ReclamationType;
use App\Advert;
use App\History;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){



        if(User::where('id',Auth::id())->pluck('isAdmin')->first()){
            $offeneRec=Reclamation::where('reclamationStatus',1)->get();
            $bestätigteRec=Reclamation::where('reclamationStatus',2)->get();
            $abgelehnteRec=Reclamation::where('reclamationStatus',3)->get();

            return view('reclamations/index')->with('offene',$offeneRec)->with('bestätigte',$bestätigteRec)->with('abgelehnt',$abgelehnteRec);
        }else{
            $id = Auth::id();
            $offeneRec=Reclamation::where('reclamationStatus',1)->where('buyerId',$id)->get();
            $bestätigteRec=Reclamation::where('reclamationStatus',2)->where('buyerId',$id)->get();
            $abgelehnteRec=Reclamation::where('reclamationStatus',3)->where('buyerId',$id)->get();
            // $rows = DB::select('SELECT advertId,created_at,description,ownerId,price,prodCategory,title  FROM advert WHERE ownerId=?',[$id]);
            return view('reclamations/index')->with('offene', $offeneRec)->with('bestätigte',$bestätigteRec)->with('abgelehnt',$abgelehnteRec);
        }
    }

    public function againstMe(){
        $id=Auth::id();
        $offeneRec = Reclamation::where('reclamationStatus',1)->where('ownerId',$id)->get();
        $bestätigteRec=Reclamation::where('reclamationStatus',2)->where('ownerId',$id)->get();
        $abgelehnteRec=Reclamation::where('reclamationStatus',3)->where('ownerId',$id)->get();
        return view('reclamations/againstMe')->with('offene',$offeneRec)->with('bestätigte',$bestätigteRec)->with('abgelehnt',$abgelehnteRec);
    }

    public function show($id){
        $rows= Reclamation::where('reclamationId',$id)->first();
        return view('reclamations/show')->with('reclamation',$rows);
    }

    public function create($id){
        $categories=ReclamationType::all();
        return view('reclamations/create')->with('categories',$categories)->with('id',$id);
    }

    public function store(Request $request){
        $request->validate([
            'reclamationStatus' => array('min:1','max:3'),
            'description' => array('max:300')
        ]);
        $buyerId=History::where('historyId',$request->historyId)->pluck('buyerId')->first();
        $ownerId=History::where('historyId',$request->historyId)->pluck('sellerId')->first();
        $reclamationTypeId=ReclamationType::where('description','=',$request->reclamationType)->get()->pluck('reclamationTypeId')->first();

        $reclamation = new Reclamation;
        $reclamation->type=$reclamationTypeId;
        $reclamation->description=$request->description;
        $reclamation->buyerId=$buyerId;
        $reclamation->ownerId=$ownerId;
        $reclamation->historyId=$request->historyId;
       // $reclamation->historyId=Advert::where('ownerId',$ownerId)->pluck('advertId')->first();
        $reclamation->save();

        return redirect()->action('ReclamationController@index');
    }

    public function confirm($id, Request $request){

        if(User::where('id',Auth::id())->pluck('isAdmin')->first()) {
            Reclamation::where('reclamationId', $id)->update(['reclamationStatus' => 2]);
            $request->session()->flash('alert-success','Reklamation bestätigt');
            return redirect()->action('ReclamationController@index');
        }else{
            $request->session()->flash('alert-danger','Reklamationen können nur durch Admin bestätigt werden');
            return redirect()->action('ReclamationController@index');
        }

    }

    public function reject($id, Request $request){

        if(User::where('id',Auth::id())->pluck('isAdmin')->first()) {
            Reclamation::where('reclamationId', $id)->update(['reclamationStatus' => 3]);
            $request->session()->flash('alert-success','Reklamation abgelehnt');
            return redirect()->action('ReclamationController@index');
        }else{
            $request->session()->flash('alert-danger','Reklamationen können nur durch Admin abgelehnt werden');
            return redirect()->action('ReclamationController@index');
        }

    }

}
