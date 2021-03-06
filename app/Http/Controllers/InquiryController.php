<?php
namespace App\Http\Controllers;

use App\Advert;
use App\History;
use App\Inquiry;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
class InquiryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showall(Request $request){
        if(User::where('id',Auth::id())->pluck('isAdmin')->first()){
            $angefragt=Inquiry::where('statusflag',0)->get();
            $bestätigt=Inquiry::where('statusflag',1)->get();
            $abgelehnt=Inquiry::where('statusflag',2)->get();

            return view('inquiries.admin')->with('angefragt',$angefragt)->with('bestätigt',$bestätigt)->with('abgelehnt',$abgelehnt);
        }else{
            $request->session()->flash('alert-error','Nur ein Admin darf diese Funktion ausführen');
            return redirect()->action('HomeController@index');
        }
    }

    public function index()
    {
        //Adminfunktion
        if(User::where('id',Auth::id())->pluck('isAdmin')->first()){
            $angefragt=Inquiry::where('statusflag',0)->get();
            $bestätigt=Inquiry::where('statusflag',1)->get();
            $abgelehnt=Inquiry::where('statusflag',2)->get();

            return view('inquiries/index')->with('angefragt',$angefragt)->with('bestätigt',$bestätigt)->with('abgelehnt',$abgelehnt);
        }
        //Normaler User
        else{
            $id=Auth::id();
            $angefragt=Inquiry::where('buyerId',$id)->where('statusflag',0)->get();
            $bestätigt=Inquiry::where('buyerId',$id)->where('statusflag',1)->get();
            $abgelehnt=Inquiry::where('buyerId',$id)->where('statusflag',2)->get();
            $all=DB::select('SELECT * FROM inquiry where buyerId=?',[$id]);
            return view('inquiries/index')->with('angefragt',$angefragt)->with('bestätigt',$bestätigt)->with('all',$all)->with('abgelehnt',$abgelehnt);

            }
    }
    public function showrequested()
    {
        $id = Auth::id();
        if (User::where('id', Auth::id())->pluck('isAdmin')->first()) {
            $angefragt=Inquiry::where('statusflag',0)->get();
        }else {
            $angefragt=Inquiry::where('buyerId',$id)->where('statusflag',0)->get();
        }
        return view('inquiries.requested')->with('angefragt', $angefragt);

    }

    public function showdenied()
    {
        $id = Auth::id();
        if (User::where('id', Auth::id())->pluck('isAdmin')->first()) {
            $abgelehnt=Inquiry::where('statusflag',2)->get();
        }else {
            $abgelehnt=Inquiry::where('buyerId',$id)->where('statusflag',2)->get();
        }
        return view('inquiries.denied')->with('abgelehnt', $abgelehnt);

    }

    public function showconfirmed()
    {
        $id = Auth::id();
        if (User::where('id', Auth::id())->pluck('isAdmin')->first()) {
            $bestätigt=Inquiry::where('statusflag',1)->get();
        }else {
            $bestätigt=Inquiry::where('buyerId',$id)->where('statusflag',1)->get();
        }
        return view('inquiries.confirmed')->with('bestätigt', $bestätigt);

    }



    public function create($id,Request $request){

        $advert=$request->session()->get('advert');

        return view('inquiries/create')->with('id',$id)->with('advert',$advert);
    }


    public function store(Request $request){    //status 0 steht für angefragt
        $validatedData= $request->validate([
            'advert'=>array('numeric','required'),
            'text' =>array('min:3','max:300')
        ]);
        $id = Auth::id();
        $owner=DB::table('users')->join('advert','users.id','=','advert.ownerId')->where('advertId',$request->advert)->value('users.id');
        try {
            DB::insert('insert into inquiry (statusflag,text,advertId,ownerId,buyerId) values (0,?,?,?,?)',[$request->text,$request->advert,$owner,$id]);
            $request->session()->flash('alert-success','Anfrage für Artikel '.$request->advert.' erfolgreich gestellt');
            return redirect()->action('HomeController@index');
        }catch (QueryException $e){
            $request->session()->flash('alert-error','Anfrage für Artikel '.$request->advert.' fehlgeschlagen');
            return redirect()->action('HomeController@index');
        }

    }


    public function destroy($id,Request $request)
    {
        $owner=Inquiry::where('inquiryId',[$id])->get()->pluck('buyerId')->first();
        if ($owner==Auth::id()||User::where('id',Auth::id())->pluck('isAdmin')->first()){
            DB::delete('delete from inquiry where inquiryId=?', [$id]);
            $request->session()->flash('alert-info','Anfrage gelöscht');
            if(User::where('id',Auth::id())->pluck('isAdmin')->first()){
                return redirect()->action('InquiryController@showall');
            }else{
                return redirect()->back();
            }

        }
        else{
            $request->session()->flash('alert-danger','Sie haben diese Anfrage nicht verschickt, sie sind nicht berechtigt, fremde Anfragen zu löschen');
            return redirect()->action('HomeController@index');
        }

    }

    public function confirm($id,Request $request)
    {
        $inquiry=Inquiry::where('inquiryId',$id)->get()->first();
        $advert=Advert::where('advertId',$inquiry->advertId)->get()->first();
        $advertOwner=Inquiry::where('ownerId',Auth::id())->where('inquiryId',$id)->get()->pluck('ownerId')->first();
        if($advertOwner==Auth::id()||User::where('id',Auth::id())->pluck('isAdmin')->first()){
            DB::update('UPDATE `inquiry` SET `statusflag` = \'1\' WHERE `inquiry`.`inquiryId` = ?',[$id]);
            $request->session()->flash('alert-success','Anfrage angenommen');
            //nach Bestätigung einer Anfrage wird Eintrag in Historie angelegt

            $history=new History();
            $history->title=$advert->title;
            $history->description=$advert->description;
            $history->sellerId=$inquiry->ownerId;
            $history->buyerId=$inquiry->buyerId;
            $created_at=now();
            $updated_at=now();
            $history->save();
            return redirect()->action('InquiryController@mine');
        }else{
            $request->session()->flash('alert-danger','Annahme war nicht möglich, sie sind nicht Besitzer dieser Anfrage');
            return redirect()->action('InquiryController@mine');
        }


    }
    public function reject($id, Request $request){
        $advertOwner=Inquiry::where('ownerId',Auth::id())->where('inquiryId',$id)->get()->pluck('ownerId')->first();
        if($advertOwner==Auth::id()||User::where('id',Auth::id())->pluck('isAdmin')->first()){
            DB::update('UPDATE `inquiry` SET `statusflag` = \'2\' WHERE `inquiry`.`inquiryId` = ?',[$id]);
            $request->session()->flash('alert-success','Anfrage abgelehnt');
            return redirect()->action('InquiryController@mine');
        }else{
            $request->session()->flash('alert-danger','Ablehnung war nicht möglich, sie sind nicht Besitzer des Artikels');
            return redirect()->action('InquiryController@mine');
        }

    }

    public function mine(){
        $id=Auth::id();

        $angefragt = DB::select('SELECT * FROM inquiry where ownerId=? and statusflag=0',[$id]);

        return view('inquiries/mine')->with('mine',$angefragt);

    }



}
