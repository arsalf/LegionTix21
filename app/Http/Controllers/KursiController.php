<?php

namespace App\Http\Controllers;

use App\Models\Kursi;
use App\Models\Studio;
use App\Models\TypeKursi;
use App\Models\TypeStudio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class KursiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page = 5;
        $data = DB::table('ViewKursiStudio')
        ->where('account_id', '=', auth()->user()->id)
        ->paginate($page);
        return view('app.admin.table.index', [
            'data'=>$data,             
            'table_name' => 'KURSI',
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
        return view('app.admin.table.create', [            
            'header'=>['max_row', 'max_seat', 'studio_id'],
            'table_name' => 'KURSI',
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
        $pdo = DB::getPdo();
        $p1 = $request->studio_id;
        $p2 = $request->max_row;
        $p3 = $request->max_seat;

        $stmt = $pdo->prepare("begin makeKursi(:p1, :p2, :p3); end;");
        $stmt->bindParam(':p1', $p1, PDO::PARAM_INT);
        $stmt->bindParam(':p2', $p2, PDO::PARAM_STR);
        $stmt->bindParam(':p3', $p3, PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->back()->with('status', 'Success insert kursi!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $data = DB::table('ViewKursi')
        ->where('studio_id', '=', $id)
        ->get();
        return view('app.admin.kursi.show', [
            'id' => $id,
            'data' => $data,
            'table_name' => 'KURSI',
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
        $data = Kursi::
            where('baris', '=', $request->id_row)
            ->where('kolom', '=', $request->id_seat)
            ->where('studio_id', '=', $id)
            ->update([
                'baris'=> $request->row,
                'kolom' =>$request->seat,
                'typekursi_name' =>$request->type,
                'show'=>$request->show,
            ]);           
        
        return redirect()->back()->with('status', 'success update kursi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $data = Kursi::
        where('baris', '=', $request->id_row)
        ->where('kolom', '=', $request->id_seat)
        ->where('studio_id', '=', $id)
        ->delete();

        return redirect()->back()->with('status', 'success delete kursi!');
    }

    public function getKursi($id){
        $data = DB::table('ViewKursi')
        ->where('studio_id', '=', $id)->get();

        return $data;
    }

    public function getAllType(){
        $data = TypeKursi::all();

        return $data;
    }

}
