<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\link;

class RouteController extends Controller
{
    //Index Page
    function index() {
        return view('index', ['maintainance' => true]);
    }

    //Adds a URL
    function add(Request $request) {
        $req = $request->all();

        return ['report' => 'SITE UNDER MAINTAINANCE'];
    }

    function redirectToKey(link $id) {
        $id->visits++;
        $id->save();
        return redirect($id->url);

    }

}
