<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ProductCategory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /**  public function __construct()
    {
        $this->middleware('auth');
    }
   * */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category=ProductCategory::all();
        //$category=DB::select('SELECT description FROM productCategory');
        if(Auth::check()){
            $name=DB::select( 'SELECT name FROM users');
            return view('welcome')->with('categories',$category)->with('username',$name);
        }
        else{
            return view('welcome')->with('categories',$category);
        }




    }
}
