<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('CITY')
                    ->join('PROVINCE', 'CITY.PROVINCE_ID', '=', 'PROVINCE.ID')
                    ->orderBy('PROVINCE.ID', 'asc')
                    ->select('CITY.*', 'PROVINCE.NAME as PROVINCE_NAME')
                    ->get();
        $dataTable = new City();
        $arr = $dataTable->getFillable();
        array_push($arr, 'PROVINCE NAME');
        return view('app.admin.table.index', [
            'data'=>$data, 
            'header'=>$arr,
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
        $dataTable = new City();
        
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
            'province_id'=>'required',
        ]);

        //Save a new data role to db
        $data = new City;
        $data->name = $request->name;
        $data->province_id = $request->province_id;
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
        $data = City::find($id);
        $dataTable = new City();

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
        $data = City::find($id);
        $dataTable = new City();
        
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
        
        City::where('id', $id)->update([
            'id'=>$request->id,
            'name'=>$request->name,
        ]);
        
        $id = $request->id;

        return redirect()->route('city.edit', $id)->with('status', 'Success update City!');
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
        $data = City::find($id);
        City::where('id', $id)->delete();
        

        return redirect()->back()->with('status', 'Success delete a city '.$data->name.'!');
    }

    public function getCity($id){
        $data = City::where('province_id', $id)->get();
        return $data;
    }
    
    public function getAllCity(){
        $data = City::all();
        return $data;
    }
    
}
