<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use PDO;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page = 10;
        $data = DB::table('ViewFilm')->paginate($page);
        $dataTable = new Film();
        
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
        $dataTable = new Film();
        
        return view('app.admin.film.create', [
            'results'=>null,
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
        if($request->jenis=='manual'){
            //manual
            $pdo = DB::getPdo();    
            $stmt = $pdo->prepare("
            begin                 
                insertFilmManual(:p2, :p3, :p12, :p4, :p5, :p6, :p7, :p13, :p8, :p9, :p10, :p11);
            end;");        
            $param1 = $request->title;
            $stmt->bindParam(':p2', $param1, PDO::PARAM_STR);
            $param2 = $request->image;
            $stmt->bindParam(':p3', $param2, PDO::PARAM_STR);
            $param3 = $request->duration;
            $stmt->bindParam(':p4', $param3, PDO::PARAM_STR);
            $param4 = $request->genre;
            $stmt->bindParam(':p5', $param4, PDO::PARAM_STR);      
            $param5 = $request->rating;
            $stmt->bindParam(':p6', $param5, PDO::PARAM_INT);
            $param6 = $request->director;
            $stmt->bindParam(':p7', $param6, PDO::PARAM_STR);
            $param7 = $request->trailer;
            $stmt->bindParam(':p8', $param7, PDO::PARAM_STR);
            $param8 = $request->release_date;
            $stmt->bindParam(':p9', $param8, PDO::PARAM_STR);
            $param9 = $request->language;
            $stmt->bindParam(':p10', $param9, PDO::PARAM_STR);
            $param10 = $request->country;
            $stmt->bindParam(':p11', $param10, PDO::PARAM_STR);
            $param11 = $request->plot;
            $stmt->bindParam(':p12', $param11, PDO::PARAM_STR);
            $param12 = $request->actors;
            $stmt->bindParam(':p13', $param12, PDO::PARAM_STR);
            try{
                $stmt->execute();
            }catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
            }            
        }else{
            //by search
        }

        return redirect()->back()->with('status', 'success add film!');
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
    }

    public function searchData(Request $request){        
        try{
            $data = Http::get('https://imdb-api.com/en/API/SearchMovie/k_1q09gcv7/'.$request->search)['results'];
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
        
        $in = "";
        $dataTable = new Film();
                
        return view('app.admin.film.create', [
            'results'=> $data,
            'data'=>$in,
            'header'=>$dataTable->getFillable(),
            'table_name' => $dataTable->getTable(),
        ]);
    }
}
