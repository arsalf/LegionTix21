<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Index Role Manage Table
        $data = Role::orderBy('id', 'asc')->get();
        $dataTable = new Role();
        
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
        // form to create role name
        $data = "";
        $dataTable = new Role();
        
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
        $this->validate($request, [
            'name'=>'required|max:10',
        ]);

        //Save a new data role to db
        $data = new Role;
        $data->name = $request->name;
        $data->save();
        // DB::executeProcedure('insert_role', ['name' => $request->name]);

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
        $data = Role::find($id);
        $dataTable = new Role();

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
        $data = Role::find($id);
        $dataTable = new Role();
        
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
            'name'=>'required|max:10'
        ]);
        
        Role::where('id', $id)->update([
            'id'=>$request->id,
            'name'=>$request->name,
        ]);
        
        $id = $request->id;

        return redirect()->route('role.edit', $id)->with('status', 'Success update role!');
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
        $role = Role::find($id);
        Role::where('id', $id)->delete();
        

        return redirect()->back()->with('status', 'Success delete a role '.$role->name.'!');
    }
}
