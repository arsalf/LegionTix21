<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dompet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Showtime;
use App\Models\Tiket;
use Exception;

class KursiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $tiket = new Tiket();
        $tiket->account_id = auth()->user()->id;
        $tiket->showtime_id = $request->id;
        $tiket->kursi_baris = $request->kursi_baris;
        $tiket->kursi_kolom = $request->kursi_kolom;        
        $tiket->save();

        $tikets = DB::table('ViewTiket')
        ->where('id', '=', $tiket->id)
        ->first();

        return $tikets;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
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
        try{
            $showtime = DB::table('showtimeStudio')
            ->where('id', '=', $id)
            ->first();
            $dompet =  Dompet::where('account_id', '=', auth()->user()->id)
            ->first();
            $dataKursi = DB::table('ViewKursi')
            ->where('studio_id', '=', $showtime->studio_id)
            ->get();
            $dataTiket = DB::table('ViewTiket')
            ->where('account_id', '=', auth()->user()->id)
            ->get();
        }catch(Exception $e){
            return redirect('home.index');
        }
        
        return view('app.home.film.kursi', [
            'id' => $id,
            'dataKursi' => $dataKursi,
            'pesanan' => $dataTiket,
            'dompet'=>$dompet,            
            'showtime'=>$showtime,
        ]);
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
        
        try{            
            $tiket = Tiket::find($id);
            if(is_null($tiket)){
                return redirect()->back()->withError('Tiket not found!');    
            }      
            $tiket->delete();
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
        return redirect()->back()->with('status', 'success delete');
    }

    public function serveTiket(Request $req){
        return $req;
    }
}
