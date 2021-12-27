<?php

namespace App\Http\Controllers;

use App\Models\HargaTiket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page = 15;
        if(auth()->user()->role_name=="MANAGER"){
            $data = DB::table('ViewHargaTiket')
            ->where('account_id', '=', auth()->user()->id)
            ->paginate($page);
        }else{
            $data = DB::table('ViewHargaTiket')
            ->join('account', 'account.id', '=', 'ViewHargaTiket.account_id')
            ->where('ViewHargaTiket.account_id', '=', auth()->user()->id)        
            ->orWhere('account.account_id', '=',  auth()->user()->id)
            ->select(['ViewHargaTiket.*'])
            ->paginate($page);
        }
            
        
        $dataTable = new HargaTiket();
        
        return view('app.admin.table.index', [
            'data'=>$data,
            'table_name' => $dataTable->getTable(),
            'page'=>$page
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
        $dataTable = new HargaTiket();
        
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
        $data = new HargaTiket;
        $data->day_name = $request->day_name;
        $data->studio_id = $request->studio_id;
        $data->harga = $request->harga;
        try{
            $data->save();
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }        

        return redirect()->back()->with('status', 'success add harga tiket');

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
        $data = DB::table('ViewHargaTiket')
            ->where('id', '=', $id) 
            ->first();
        $dataTable = new HargaTiket();
        // return $data;
        return view('app.admin.table.edit', [
            'id'=>$id,
            'data'=>$data,
            'header'=>$dataTable->getFillable(),
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
        $arr = explode('-', $id);
        $day = $arr[0];
        $st = $arr[1];
        $data = HargaTiket::where('day_name', '=', $day)
        ->where('studio_id', '=', $st)
        ->update([
            'HARGA' => $request->harga
        ]);        

        return redirect()->back()->with('status', 'succes update harga');
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
        $arr = explode('-', $id);
        $day = $arr[0];
        $st = $arr[1];
        $data = HargaTiket::where('day_name', '=', $day)
        ->where('studio_id', '=', $st)
        ->delete();
        return redirect()->back()->with('status', 'succes update harga');
    }
}
