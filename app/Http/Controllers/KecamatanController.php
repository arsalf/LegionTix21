<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
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
        $data = DB::table('ViewKecamatan')
        ->paginate($page);
        $dataTable = new Kecamatan();
        $arr = $dataTable->getFillable();

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
        $dataTable = new Kecamatan();
        
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
            'city_id'=>'required',
        ]);

        //Save a new data role to db
        $data = new Kecamatan();
        $data->name = $request->name;
        $data->city_id = $request->city_id;
        $data->save();

        return redirect()->back()->with('status', 'Success add a kecamatan!');
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
        $data = Kecamatan::find($id);
        $dataTable = new Kecamatan();
        
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
        $kec = Kecamatan::find($id);
        $kec->name = $request->name;
        $kec->city_id = $request->city_id;
        $kec->save();

        return redirect()->back()->with('status', 'Success update kecamatan!');
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
        $kec = Kecamatan::find($id);      
        $kec->delete();
        return redirect()->back()->with('status', 'Success delete kecamatan!');
    }

    public function getKecamatan($id){
        $data = Kecamatan::where('city_id', $id)->get();

        return $data;
    }
}
