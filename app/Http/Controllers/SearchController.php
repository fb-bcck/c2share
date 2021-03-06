<?php

namespace App\Http\Controllers;
use App\Advert;
use App\ProductCategory;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller{
    public function index()
    {
        return view('search.search');
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $categoryNumber=ProductCategory::where('description',$request->category)->pluck('productCategory')->first();
            $search=$request->search;
            $adverts = DB::table('advert')
                ->where(function ($query) use ($search){
                    $query->orWhere('title','like','%'.$search.'%')
                        ->orWhere('description','like','%'.$search.'%')
                        ->orWhere('tags','like','%'.$search.'%');

                })
                ->where('prodCategory','=',$categoryNumber)
                ->where('price','<=',$request->price)
                ->orderBy('price')
                ->get();
            if ($adverts) {
                foreach ($adverts as $key => $advert) {
                    $output .= '<tr>' .
                        '<td>' . $advert->title . '</td>' .
                        '<td>' . $advert->description . '</td>' .
                        '<td>' . $advert->price . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }




    public function staticsearch(Request $request){

        $productId= ProductCategory::where('description','=',$request->productCategory)->get('productCategory')->pluck('productCategory');

        $search=$request->get('search');
        // //

        $adverts=DB::table('advert')
        ->where(function ($query) use ($search,$productId){
            $query->orWhere('title','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%')
                ->orWhere('tags','like','%'.$search.'%');

        })
            ->where('prodCategory','=',$productId)
            ->where('price','<=',$request->price)
            ->orderBy('price')
            ->paginate(10);
        $request->session()->flash('alert-info',count($adverts).' Ergebnisse für '.$search);
        return view('search.result')->with('adverts',$adverts);
    }


}
