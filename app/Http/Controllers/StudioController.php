<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudioController extends Controller
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
        $dataTable = new Studio();
        if(auth()->user()->role_name=="MANAGER"){
            $data = DB::table('ViewStudio')
            ->where('account_id', '=', auth()->user()->id)        
            ->paginate($page);
        }else{
            $data = DB::table('ViewStudio')
            ->join('account', 'account.id', '=', 'ViewStudio.account_id')
            ->where('ViewStudio.account_id', '=', auth()->user()->id)        
            ->orWhere('account.account_id', '=',  auth()->user()->id)
            ->select(['ViewStudio.*'])
            ->paginate($page);
        }
        

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
        $dataTable = new Studio();
        
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
        // via Query Builder
        $a =  $request->bioskop_id;
        $b = $request->name;
        $result = DB::selectOne("select isExistNameStudioInBioskop($a, '$b') as value from dual");
       
        if(!$result->value){
            $data = new Studio;
            $data->name = $request->name;
            $data->type = $request->type;    
            $data->bioskop_id = $request->bioskop_id;
            $data->save();
        }else{
            return redirect()->back()->withErrors('STUDIO NAME telah ada!');
        }
    
        return redirect()->back()->with('status', 'success add studio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Studio::find($id);
        $dataTable = new Studio();
        
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
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //                
        $a =  $request->bioskop_id;
        $b = $request->name;
        $result = DB::selectOne("select isExistNameStudioInBioskop($a, '$b') as value from dual");
       
        if(!$result->value){
            $data = Studio::find($id);
            $data->name = $request->name;
            $data->type = $request->type;    
            $data->isactive = $request->isactive;
            $data->bioskop_id = $request->bioskop_id;
            $data->save();
        }else{
            return redirect()->back()->withErrors('STUDIO NAME telah ada!');
        }
    
        return redirect()->back()->with('status', 'success update studio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Studio::find($id);
        $data->isActive = 0;
        $data->save();
        
        return redirect()->back()->with('status', 'success delete studio');        
    }

    public function getStudio($name){
        $data = DB::table('showTimeStudio')
        // ->where('bioskop_name',$name)
        ->distinct()
        ->get(['studio_type','studio_id','studio_name']);

        return $data;
    }
}
