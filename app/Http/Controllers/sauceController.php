<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class sauceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sauces = sauce::all();

        return view('home', compact('sauces'));
    }


    public function show(sauce $sauces)
    {
        return view('show', compact('sauces'));
    }

    public function addLike(sauce $sauces)
    {
        $sauce = sauce::find($sauces->idSauce);
        $sauceLikes = $sauce->likes;
        $sauceLikes ++;
        $sauce->likes = $sauceLikes;
        $sauce->save();

        return redirect()->route('sauce.show', $sauces);
    }

    public function addDislike(sauce $sauces)
    {
        $sauce = sauce::find($sauces->idSauce);
        $sauceDislikes = $sauce->dislikes;
        $sauceDislikes ++;
        $sauce->dislikes = $sauceDislikes;
        $sauce->save();

        return redirect()->route('sauce.show', $sauces);
    }
}
