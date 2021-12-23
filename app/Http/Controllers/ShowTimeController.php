<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= DB::table('ViewShowtime')->paginate(15);
        $dataTable = new Showtime();

        return view('app.admin.table.index', [
            'data'=>$data,
            'table_name' => $dataTable->getTable(),
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
        $data = "";
        $dataTable = new Showtime;

        return view('app.admin.table.create', [
            'data'=>$data,
            'header'=>$dataTable->getFillable(),
            'table_name' => $dataTable->getTable(),
        ]);
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
        $data = new Showtime;
        $data->waktu =date("Y/m/d H:i", strtotime($request->waktu));
        $data->film_id = $request->film_id;
        $data->studio_id = $request->studio_id;
        try{
            $data->save();
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->back()->with('status', 'success add showtime');
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
        $data = Showtime::find($id);
        $dataTable = new Showtime();
        
        return view('app.admin.table.edit', [
            'id' => $id,
            'data'=>$data,
            'table_name' => $dataTable->getTable(),
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
        $a =  date("Y/m/d H:i", strtotime($request->waktu));
        $b = $request->film_id;
        $c = $request->studio_id;
        $result = DB::selectOne("select isEmptySchedule('$a', $b, $c) as value from dual");        
        if(!$result->value){
            return redirect()->back()->withErrors('JADWAL BENTROK!');
        }

        $data = Showtime::find($id);
        $data->waktu =date("Y/m/d H:i", strtotime($request->waktu));
        $data->film_id = $request->film_id;
        $data->studio_id = $request->studio_id;
        try{
            $data->save();
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        } 

        return redirect()->back()->with('status', 'success add showtime');
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
        $data = Showtime::find($id);
        try{
            $data->delete();
        }catch(Exception $e){
            try{
                $data->isactive=0;
                $data->save();
            }catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
        return redirect()->back()->with('status', 'success delete showtime');
    }

    
    public function getJamTayang($id){
        $data = DB::table('showTimeStudio')
        // ->where('studio_id',$id)
        ->distinct()
        ->get(['waktu']);

        return $data;
    }
}
