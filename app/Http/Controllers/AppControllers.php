<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\TopUp;

class AppControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topup = TopUp::all();
        $filmRating = Film::orderBy('rating', 'asc')->paginate(3);
        $filmOnGoing = Film::orderBy('title', 'asc')->paginate(6);
        $filmComingSoon = Film::orderBy('id', 'desc')->paginate(6);
        // $filmOnGoing = Film::where('release_date', '<', $current_timestamp = Carbon::now()->timestamp)->orderBy('rating', 'asc')->paginate(6);
        // $filmComingSoon = Film::where('release_date', '>', $current_timestamp = Carbon::now()->timestamp)->orderBy('rating', 'asc')->paginate(6);
        return view('app.home.index',[
            'topup'=>$topup,
            'filmRating'=>$filmRating,
            'filmOnGoing'=>$filmOnGoing,
            'filmComingSoon'=>$filmComingSoon,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topup = TopUp::all()->where('status', '=', 'PENDING');
        return view('app.home.profile',[
            'topup'=>$topup,
        ]);
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
        //
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
