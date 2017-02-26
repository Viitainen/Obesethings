<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rip;
use App\Player;
use App\Http\Requests\StoreRip;

class RipsController extends Controller
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
    public function index(Request $request)
    {
        if($request->query('q') == 'byplayer') {
            $players = Player::has('rips')->inRandomOrder()->with('rips')->get();
            return view('rip.index', compact('players'));
        } else {
            $rips = Rip::latest()->paginate(12);
            return view('rip.index', compact('rips'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::pluck('name', 'id');
        return view('rip.create', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRip $request)
    {
        $data = $request->input();
        unset($data['players']);
        $rip = Rip::create($data);

        $rip->players()->attach($request->input('players'));

        return redirect()->action('RipsController@index')->with('status', 'Rip added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rip = Rip::with('players')->findOrFail($id);
        return view('rip.show', compact('rip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rip = Rip::with('players')->findOrFail($id);
        $allPlayers = Player::all()->pluck('name','id');
        $players = $rip->players()->pluck('id')->toArray();
        return view('rip.edit', compact('rip', 'players', 'allPlayers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRip $request, $id)
    {
        $rip = Rip::find($id);
        $rip->players()->sync($request->input('players'));
        unset($request['players']);
        $rip->update($request->all());
        return redirect()->action('RipsController@show', $id)->with('status', 'Rip Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rip::findOrFail($id)->delete();
        return back();
    }
}
