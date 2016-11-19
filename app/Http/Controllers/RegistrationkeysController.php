<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrationkey;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;


class RegistrationkeysController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = Registrationkey::where('claimed', false)->orderBy('valid_until', 'desc')->limit(20)->get();
        return view('registrationkey.index', compact('keys'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrationkey.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Registrationkey::create([
            'valid_until' => Carbon::now()->addWeeks(1),
            'key' => Uuid::uuid4()->toString()
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Registrationkey::findOrFail($id)->delete();
        return back();
    }
}
