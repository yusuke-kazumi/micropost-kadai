<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function store(Request $request, $id)
    {
       \Auth::user()->favourite($id);
       return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfavourite($id);
        return redirect()->back();
    }

}
