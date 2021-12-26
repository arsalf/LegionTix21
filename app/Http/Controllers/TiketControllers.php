<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $param1 = auth()->user()->id;
        $param2 = $request->harga;
        $result = DB::selectOne("select isSaldoCukup($param1,$param2) as value from dual");
        return $result->value; // prints 6

        // $pdo = DB::getPdo();    
        // $stmt = $pdo->prepare("
        // begin
        //      :p0 := isSaldoCukup(:p1, :p2);
        // end;");   
        
        // // $stmt->bindParam(':p0', $param0, PDO::PARAM_STR);
        // $stmt->bindParam(':p0', $result);
        // $param1 = auth()->user()->id;
        // $stmt->bindParam(':p1', $param1);
        // $param2 = $request->harga;
        // $stmt->bindParam(':p2', $param2);
        // try{
        //     $stmt->execute();
        //     return $harga;
        // }catch(Exception $e){
        //     return redirect()->back()->withErrors($e->getMessage());
        // }            

        // if ($param2 == 0) {
        //     return redirect()->back()->with('status', 'Pembayaran berhasil, terimakasih!');
        // }else{
        //     return redirect()->back()->with('status', 'Pembayaran berhasil, kembalian anda Rp.'.$param2);
        // }

        // return $stmt->execute();
        // return $request;
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
            $tomorrow =date("Y-m-d", strtotime('tomorrow + 1day')); 
            $yesterday = date("Y-m-d", strtotime('tomorrow')); 
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
