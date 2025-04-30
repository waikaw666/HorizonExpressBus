<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Origin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $originList = Origin::all();
        $destinationList = Destination::all();

        return view('home',['originList'=>$originList,'destinationList'=>$destinationList]);
    }

    public function search(Request $request){

        return $request->all();
    }

    public function contact()
    {
        return view('main.contact');
    }
    public function about()
    {
        return view('main.about');
    }
}
