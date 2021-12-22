<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
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
        $dataTable = new Artikel();
        $data = Artikel::paginate($page);

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
        $dataTable = new Artikel();
        $arr = $dataTable->getFillable();

        return view('app.admin.table.create', [            
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
        $data = new Artikel;
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->koin_plus = $request->koin_plus;
        if($request->hasFile('gambar')){            
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/artikel/'.$filename);            
            $data->gambar = $filename;
        }else{
            return "tak ada";
        }
        
        $data->author = auth()->user()->username;

        try{
            $data->save();
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
        return redirect()->back()->with('status', 'success add artikel');
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
        $data = Artikel::find($id);
        try{
            $data->delete();
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());            
        }

        return redirect()->back()->with('status', 'success delete artikel');
    }
}
