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
        $rules = [
            'url' => 'required|url'
        ];

        $this->validate($request, $rules);

        $req = $request->all();

        if($req['id'] === '')
            $req['id'] = substr(md5(uniqid()), 0, 6);

        $newLink = new link();
        $newLink->id = $req['id'];
        $newLink->url = $req['url'];
        $newLink->save();

        return $req;
    }

    //Redirect
    function redirectToKey(link $id) {
        $id->visits++;
        $id->save();
        return redirect($id->url);

    }

}
