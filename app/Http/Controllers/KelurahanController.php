<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataTable = new Kelurahan();
        $page = 15;
        $data = DB::table('ViewVillage')
        ->paginate($page);
        

        return view('app.admin.table.index', [
            'data'=>$data,            
            'table_name' => $dataTable->getTable(),
            'page' => $page,
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
        $dataTable = new Kelurahan();
        
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
        $this->validate($request, [
            'name'=>'required|max:50',
            'district_id'=>'required',
        ]);

        //Save a new data role to db
        $data = new Kelurahan();
        $data->name = $request->name;
        $data->district_id = $request->district_id;
        $data->save();

        return redirect()->back()->with('status', 'Success add a desa/kelurahan!');
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
        $data = Kelurahan::find($id);
        $dataTable = new Kelurahan();
        
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
        $this->validate($request, [
            'name'=>'required|max:50',
            'district_id'=>'required',
        ]);

        $desa = Kelurahan::find($id);
        $desa->name = $request->name;
        $desa->district_id = $request->district_id;
        $desa->save();

        return redirect()->back()->with('status', 'Success update desa/kelurahan!');
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
        $desa = Kelurahan::find($id);
        $desa->delete();
        
        return redirect()->back()->with('status', 'Success destroy desa/kelurahan!');
    }

    public function getKelurahan($id){
        $data = Kelurahan::where('district_id', $id)->get();
        
        return $data;
    }
}
