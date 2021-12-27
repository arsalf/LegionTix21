<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDO;

class TiketControllers extends Controller
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
        $pdo = DB::getPdo();    
        $stmt = $pdo->prepare("
        begin
            bayarTiket(:p1);
        end;");        

        $param1 = auth()->user()->id;
        $stmt->bindParam(':p1', $param1, PDO::PARAM_STR);        
        try{
            $stmt->execute();
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }            

        return redirect()->back()->with('status', 'Pembayaran berhasil, terimakasih!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(isset($_GET['day'])){
            $tomorrow =date("Y-m-d", strtotime($_GET['day'].' + 1day')); 
            $yesterday = date("Y-m-d", strtotime($_GET['day'])); 
        }else{
            $tomorrow =date("Y-m-d", strtotime('tomorrow')); 
            $yesterday = date("Y-m-d", strtotime('day')); 
        }
        
        $days = DB::table("showtimeonlydate")
        ->where('film_id', '=', $id)
        ->get();
        $data = DB::table('showtimestudio')        
        ->where('film_id', '=', $id)
        ->where("waktu", '>', $yesterday)
        ->where("waktu", '<', $tomorrow)
        ->get();
        return view('app.home.film.ticket',[            
            'days' => $days,
            'cinemas'=>$data,
            'id'=>$id
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
