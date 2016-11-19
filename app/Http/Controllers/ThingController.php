<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Thing;

class ThingController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::has('things')->with('things')->get();
        return view('thing.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::pluck('name', 'id');
        return view('thing.create', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $thing = Thing::create(['title' => $request->input('title'), 'url' => $request->input('url')]);
        $thing->players()->attach($request->input('players'));
        return redirect()->action('ThingController@index')->with('status', 'Thing added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thing = Thing::with('players')->findOrFail($id);
        return view('thing.show', compact('thing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thing = Thing::with('players')->findOrFail($id);
        $allPlayers = Player::all()->pluck('name','id');
        $players = $thing->players()->pluck('id')->toArray();
        return view('thing.edit', compact('thing', 'players', 'allPlayers'));
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
        $thing = Thing::find($id);
        $thing->players()->sync($request->input('players'));
        unset($request['players']);
        $thing->update($request->all());
        return redirect()->action('ThingController@show', $id)->with('status', 'Thing Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thing::findOrFail($id)->delete();
        return back();
    }
}
