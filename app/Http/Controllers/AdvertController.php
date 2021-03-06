<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Advert;
use App\ProductCategory;
use App\User;
use Illuminate\Support\Facades\Storage;
use Faker\Provider\Image;

class AdvertController extends Controller
{


    public function index()
    {
        $id = Auth::id();
        if (User::where('id', Auth::id())->pluck('isAdmin')->first()) {
            $rows = Advert::get();
            return view('advert/index')->with('advert', $rows);
        } else {
            $rows = Advert::where('ownerId', $id)->get();
            return view('advert/index')->with('advert', $rows);
        }

    }


    public function create()
    {

        return view('advert/create');

    }

    public function step2(Request $request)
    {
        $advert = new Advert;
        $advert->title = $request->title;
        $advert->description = $request->description;

        $validatedData = $request->validate([
            'title' => array('required', 'min:3', 'max:80'),
            'description' => array('required','max:300')
        ]);

        $request->session()->put('advert', $advert);

        $categories = ProductCategory::all();


        return view('advert/create_2')->with('advert', $advert)->with('categories', $categories);//->with('title', $title)->with('description', $request->description)->with('categories', $categories);
    }

    public function step3(Request $request)
    {
        $validatedData =$request->validate([
            'price' => array('required','min:1','max:100000','numeric'),
            'tags' => array('max:300')
        ]);
        //Bild temporär abspeichern

        $advert = $request->session()->get('advert');


        $advert->price = $request->price;
        $advert->prodCategory = $request->prodCategory;
        $advert->tags = $request->tags;
        $categories = ProductCategory::all();
        return view('advert/create_3')->with('advert', $advert)->with('categories', $categories);//->with('title', $title)->with('description', $description)->with('price', $price)->with('category', $request->prodCategory)->with('tags', $tags)->with('categories', $categories);

    }

    public function store(Request $request)
    {
         $validatedData=$request->validate([
             'title'=> array('required','min:1','max:80'),
             'description'=>array('required','max:300'),
             'price'=>array('required','max:100000','numeric'),
             'tags'=>array('min:0','max:300')
         ]);

        $advert = $request->session()->get('advert');
        $advert2 = new Advert;
        $advert2->title = $advert->title;
        $advert2->description = $advert->description;
        $advert2->price = $advert->price;
        $advert2->prodCategory = ProductCategory::where('description', $advert->prodCategory)->value('productCategory');
        $advert2->tags = $advert->tags;
        $advert2->ownerId = Auth::id();
        $advert2->save();


        $request->session()->flash('alert-success', 'Speichern des Artikels war erfolgreich');
        return redirect()->action('AdvertController@index');
    }

    public function destroy($id, Request $request)
    {
        $advertOwner = Advert::where('advertId', [$id])->get()->pluck('ownerId')->first();
        //Admin oder passender User
        if ($advertOwner == Auth::id() || User::where('id', Auth::id())->pluck('isAdmin')->first()) {
            DB::delete('delete from advert where advertId=?', [$id]);
            $request->session()->flash('alert-info', 'Artikel ' . $id . ' wurde gelöscht');
            return redirect()->action('AdvertController@index');
        } else {
            $request->session()->flash('alert-danger', 'Sie sind nicht Besitzer der Anzeige, Löschen nicht möglich');
            return redirect()->action('AdvertController@index');
        }

    }

    public function edit($id, Request $request)
    {

        $ownerId = Auth::id();
        $advertOwner = Advert::where('advertId', [$id])->get()->pluck('ownerId')->first();
        if ($ownerId == $advertOwner || User::where('id', Auth::id())->pluck('isAdmin')->first()) {
            $data = DB::select('SELECT * FROM advert WHERE advertId=?', [$id]);
            if (count($data) > 0) {

                $result = $data[0];

            }

            $categories = ProductCategory::all();
            $category = ProductCategory::where('productCategory', $result->prodCategory)->pluck('description')->first();
            return view('advert/edit')->with('data', $result)->with('categories', $categories)->with('category', $category);
        } else {
            $request->session()->flash('alert-danger', 'Sie sind nicht Besitzer der Anzeige');
            return redirect()->action('AdvertController@index');
        }

    }

    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'title'=> array('required','min:1','max:80'),
            'description'=>array('required','max:300'),
            'price'=>array('required','max:100000','numeric'),
            'tags'=>array('max:300')
        ]);
        $advertOwner = Advert::where('advertId', [$id])->get()->pluck('ownerId')->first();

        if ($advertOwner == Auth::id() || User::where('id', Auth::id())->pluck('isAdmin')->first()) {
            $categoryId = ProductCategory::where('description', '=', $request->prodCategory)->get()->pluck('productCategory')->first();
            Advert::where('advertId', $id)->update(['title' => $request->title, 'description' => $request->description, 'price' => $request->price, 'prodCategory' => $categoryId, 'tags' => $request->tags, 'updated_at' => now()]);
            $request->session()->flash('alert-success', 'Aktualisierung des Artikels war erfolgreich');
            return redirect()->action('AdvertController@index');
        } else {
            $request->session()->flash('alert-danger', 'Sie sind nicht Besitzer der Anzeige,Update nicht möglich');
            return redirect()->action('AdvertController@index');
        }

    }


    public function show($id, Request $request)
    {
        $rows = Advert::where('advertId', $id)->first();
        $request->session()->put('advert', $rows);
        //  return $request->session()->pull('advert');
        return view('advert/show')->with('advert', $rows);
    }


}
