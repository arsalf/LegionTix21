<?php

namespace App\Http\Controllers;

use App\Models\TypeStudio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeStudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTable = new TypeStudio();
        $page = 15;
        $data = TypeStudio::paginate($page);
        
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
        $dataTable = new TypeStudio();
        
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
        $type = new TypeStudio;
        $type->name = $request->name;;
        $type->save();

        return redirect()->back()->with('status', 'success add type studio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeStudio  $typeStudio
     * @return \Illuminate\Http\Response
     */
    public function show(TypeStudio $typeStudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeStudio  $typeStudio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = TypeStudio::where('name', '=', $id)->first();               
        $dataTable = new TypeStudio();
         
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
     * @param  \App\Models\TypeStudio  $typeStudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{
            TypeStudio::where('name', '=', $id)
                ->update([
                    'name'=>$request->name,                    
                ]);            
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage())->withInput();
        }

        return redirect()->route('typestudio.index')->with('status', 'Success update role!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeStudio  $typeStudio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            TypeStudio::where('name', '=', $id)
            ->delete();
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
        return redirect()->back()->with('status', 'Success delete a role!');
    }
}
