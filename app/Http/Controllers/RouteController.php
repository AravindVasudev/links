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

      $this->validate($request, [
          'id' => 'max:20',
          'url' => 'required|url'
      ]);

      $req = $request->all();

      if(!isset($req['id']))
          $req['id'] = substr(uniqid(),0,6);

      $newLink = new link($req);
      $newLink->save();

      return ['id' => $newLink->id];
    }

    function redirectToKey(link $id) {
        $id->visits++;
        $id->save();
        return redirect($id->url);

    }

}
