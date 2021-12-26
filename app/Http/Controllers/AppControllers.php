<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\TopUp;
use App\Models\Dompet;
use Exception;
use PDO;

class AppControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batasTanggal = date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d H:i:s'))));
        $data = DB::table('showtime')
        ->join('film', 'showtime.film_id', '=', 'film.id')
        ->join('studio', 'showtime.studio_id', '=', 'studio.id')
        ->select('showtime.waktu', 'film.*', 'studio.type','studio.name',)
        ->orderBy('rating', 'asc')
        // ->where('waktu', '<', $batasTanggal)
        ->paginate(3);
        // $data = Film::orderBy('rating', 'asc')->where('RELEASE_DATE', '<', $batasTanggal)->paginate(3);
        $filmOnGoing = DB::table('viewFilmOnGoing')->paginate(6);
        $filmComingSoon = Film::where('release_date', '>', date('Y-m-d H:i:s'))
        ->orderBy('id', 'desc')->paginate(6);
        return view('app.home.index',[
            'data'=>$data,
            // 'filmRating'=>$filmRating,
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
        $pdo = DB::getPdo();    
        $stmt = $pdo->prepare("
        begin
            bayartopup(:p1, :p2);
        end;");        

        $param1 = $request->inputKode;
        $stmt->bindParam(':p1', $param1, PDO::PARAM_STR);
        $param2 = $request->inputNominal;
        $stmt->bindParam(':p2', $param2, PDO::PARAM_STR);
        try{
            $stmt->execute();
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }            

        if ($param2 == 0) {
            return redirect()->back()->with('status', 'Pembayaran berhasil, terimakasih!');
        }else{
            return redirect()->back()->with('status', 'Pembayaran berhasil, kembalian anda Rp.'.$param2);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dompet = Dompet::all()->where('account_id', '=', $id);
        $topup = TopUp::all()->where('dompet_id', '=', $id);
        return view('app.home.profile',[
            'topup'=>$topup,
            'dompet'=>$dompet,
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
