<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $dataTable = new Region();
        $page = 10;
        $data = DB::table('ViewProvinsi')
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
        $dataTable = new Region();
        
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
        $data = new Region;
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
        $data = Region::find($id);
        $dataTable = new Region();

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
        $data = Region::find($id);
        $dataTable = new Region();
        
        return view('app.admin.table.edit', [
            'id'=>$id,
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
        $this->validate($request, [            
            'name'=>'required|max:50'
        ]);
        
        Region::where('id', $id)->update([            
            'name'=>$request->name,
        ]);
        
        $id = $request->id;

        return redirect()->back()->with('status', 'Success update provinsi!');
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
        $data = Region::find($id);
        Region::where('id', $id)->delete();
        

        return redirect()->back()->with('status', 'Success delete a Region '.$data->name.'!');
    }

    public function getProvinsi($id){
        $data = Region::find($id);
        return $data;
    }

    public function getAllProvinsi()
    {
        $data = Region::all();
        return $data;
    }
    
}
