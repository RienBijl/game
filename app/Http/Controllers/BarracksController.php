<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Barrack;
use \App\Town;
use Illuminate\Support\Facades\Auth;

class BarracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $knights = $request->input("knights");
        $archers = $request->input("archers");
        $footmen = $request->input("footmen");

        if($knights < 1 || $archers < 1 || $footmen < 1)
            return redirect("town");

        $gold = 0;
        $gold = $gold + ($knights * 40);
        $gold = $gold + ($archers * 30);
        $gold = $gold + ($footmen * 20);

        $food = 0;
        $food = $food + ($knights * 60);
        $food = $food + ($archers * 50);
        $food = $food + ($footmen * 40);

        $_gold = Auth::user()->town->gold;
        $_food = Auth::user()->town->food;

        if(($_gold < $gold) || $_food < $food)
            return redirect("town");

        $town = Town::find(Auth::user()->town->id);
        $town->gold = $_gold - $gold;
        $town->food = $_food - $food;
        $town->save();

        $barrack = Barrack::find($town->barrack->id);
        $k = $barrack->knights;
        $a = $barrack->archers;
        $f = $barrack->footmen;
        $barrack->knights = $k + $knights;
        $barrack->archers = $a + $archers;
        $barrack->footmen = $f + $footmen;
        $barrack->save();

        return redirect("barrack/" .Auth::user()->town->barrack->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barrack = Barrack::find($id);
        return view("barracks.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
