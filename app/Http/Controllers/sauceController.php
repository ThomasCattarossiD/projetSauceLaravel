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

    public function addSauceForm()
    {
        return view('addSauce');
    }

    public function ajouterSauce(Request $request)
    {
        $sauce = new sauce();
        $sauce->name = $request->input('name');
        $sauce->manufacturer = $request->input('manufacturer');
        $sauce->CreateBy = $request->input('CreateBy');
        $sauce->description = $request->input('description');
        $sauce->mainPepper = $request->input('mainPepper');
        $sauce->imageUrl = $request->input('imageUrl');
        $sauce->heat = $request->input('heat');
        $sauce->likes = $request->input('likes');
        $sauce->dislikes = $request->input('dislikes');
        $sauce->save();

        return redirect()->route('home');
    }

    public function addLike(sauce $sauces)
    {
        $sauce = sauce::find($sauces->id);
        $sauceLikes = $sauce->likes;
        $sauceLikes ++;
        $sauce->likes = $sauceLikes;
        $sauce->save();

        return redirect()->route('sauce.show', $sauces);
    }

    public function addDislike(sauce $sauces)
    {
        $sauce = sauce::find($sauces->id);
        $sauceDislikes = $sauce->dislikes;
        $sauceDislikes ++;
        $sauce->dislikes = $sauceDislikes;
        $sauce->save();

        return redirect()->route('sauce.show', $sauces);
    }

    public function modifierForm(sauce $sauces)
    {      
        $sauce = sauce::find($sauces->id);
        return view('modifierForm', compact('sauce'));
    }

    public function updateSauce(Request $request, sauce $sauces)
    {
        $sauce = sauce::find($sauces->id);
        $sauce->name = $request->input('name');
        $sauce->manufacturer = $request->input('manufacturer');
        $sauce->CreateBy = $request->input('CreateBy');
        $sauce->description = $request->input('description');
        $sauce->mainPepper = $request->input('mainPepper');
        $sauce->imageUrl = $request->input('imageUrl');
        $sauce->heat = $request->input('heat');
        $sauce->likes = $request->input('likes');
        $sauce->dislikes = $request->input('dislikes');
        $sauce->save();

        return redirect()->route('sauce.show', $sauces)->with('success', 'Retour à la page précédente');
    }

    public function supprimer(sauce $sauces)
    {
        $sauce = sauce::find($sauces->id);
        $sauce->delete();
        
        return redirect()->route('home');
    }
}
