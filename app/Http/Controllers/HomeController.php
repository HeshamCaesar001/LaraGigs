<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Lists = Listing::latest()->filter(request(['tag','search']))->get();
        return view('home',compact('Lists'));
    }

    public function showList($id)
    {

        $list = Listing::find($id);
        if(isset($list)){
            return view('Listings.showList',compact('list'));
        }else{
            return view('error404');
        }

    }
}
