<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Province::all();
        $dataTable = new Province();
        
        return view('app.admin.table.index', [
            'data'=>$data, 
            'header'=>$dataTable->getFillable(),
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
        $dataTable = new Province();
        
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
        ]);

        //Save a new data role to db
        $data = new Province;
        $data->name = $request->name;
        $data->save();

        return redirect()->back()->with('status', 'Success add a role!');
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
        $data = Province::find($id);
        $dataTable = new Province();

        return view('app.admin.table.index', [
            'data'=>$data, 
            'header'=>$dataTable->getFillable(),
            'table_name' => $dataTable->getTable(),
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
        $data = Province::find($id);
        $dataTable = new Province();
        
        return view('app.admin.table.edit', [
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
            'id'=>'required',
            'name'=>'required|max:50'
        ]);
        
        Province::where('id', $id)->update([
            'id'=>$request->id,
            'name'=>$request->name,
        ]);
        
        $id = $request->id;

        return redirect()->route('province.edit', $id)->with('status', 'Success update province!');
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
        $data = Province::find($id);
        Province::where('id', $id)->delete();
        

        return redirect()->back()->with('status', 'Success delete a province '.$data->name.'!');
    }

    public function getProvinsi($id){
        $data = Province::find($id);
        return $data;
    }

    public function getAllProvinsi()
    {
        $data = Province::all();
        return $data;
    }
    
}
