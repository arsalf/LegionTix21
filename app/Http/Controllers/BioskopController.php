<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BioskopController extends Controller
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
        $acc = new AccountController();
        if($acc->isRoleName('ADMIN')){            
            $data = DB::table('ViewBioskop')->paginate($page);
        }else if($acc->isRoleName('OWNER')){
            $data = DB::table('ViewBioskop')             
                    ->where('leader_id', '=', auth()->user()->id)
                    ->orWhere('atasan_id', '=' ,auth()->user()->id)                    
                    ->paginate($page);
        }

        $dataTable = new Bioskop();
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
        $dataTable = new Bioskop();
        $arr = $dataTable->getFillable();
                
        return view('app.admin.table.create', [
            'data'=>$data,
            'header'=>$arr,
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
            'account_id' => 'required|numeric',
            'no_rek' => 'required|unique:bioskop',
            'name' => 'required|unique:bioskop',
            'type' => 'required',
            'kelurahan' => 'required',
            'address' => 'required|max:25',
        ]);
        try{
            DB::insert(
                'insert into bioskop (account_id, no_rek, name, type, village_id, address) 
                values (?, ?, ?, ?, ?, ?)', 
                [$request->account_id, $request->no_rek, $request->name, $request->type, $request->kelurahan, $request->address]);
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
        
        return redirect()->back()->with('status', 'Success create bioskop!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function show(Bioskop $bioskop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        
        $dataTable = new Bioskop();
        $data = DB::table('ViewEditBioskop')
                    ->where('id', '=', $id)
                    ->first();            

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
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $bioskop = Bioskop::find($id);
        $bioskop->account_id = $request->manager_id;
        $bioskop->name = $request->name;
        $bioskop->type = $request->type;
        $bioskop->no_rek = $request->no_rek;
        $bioskop->address = $request->address;
        $bioskop->village_id = $request->kelurahan;
        try{
            $bioskop->save();
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        

        return redirect()->back()->with('status', 'Success update bioskop!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Bioskop::find($id);
        $data->isActive = 0;
        $data->save();

        return redirect()->back()->with('status', 'success delete bioskop');        
    }
}
