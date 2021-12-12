<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Profile;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profile = Profile::where('account_id', auth()->user()->id)->get();
        return view('app.admin.profile.index', ['profiles'=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('app.admin.profile.create');
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
            'first_name'=>'required',
            'last_name'=>'required',
            'birth_date'=>'required',
            'kelurahan'=>'required',
            'address'=>'required',
        ]);

        $data = new Profile;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->birth_date = $request->birth_date;
        $data->address = $request->address;
        $data->account_id = auth()->user()->id;
        $data->kelurahan_id = $request->kelurahan;
        $data->save();
        //statement log

        return redirect()->route('profile.index')->with('status', 'Success add profile!');
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
        $prov = Province::all();
        $city = City::all();

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
        $data = DB::table('PROFILE')
                    ->join('KELURAHAN', 'KELURAHAN.ID', '=', 'PROFILE.KELURAHAN_ID')
                    ->join('KECAMATAN', 'KECAMATAN.ID', '=', 'KELURAHAN.KECAMATAN_ID')
                    ->join('CITY', 'CITY.ID', '=', 'KECAMATAN.CITY_ID')
                    ->join('PROVINCE', 'PROVINCE.ID', '=', 'CITY.PROVINCE_ID')
                    ->select('PROFILE.*', 
                    'KELURAHAN.ID as KEL_ID', 'KELURAHAN.NAME AS KEL_NAME',
                    'KECAMATAN.ID as KEC_ID', 'KECAMATAN.NAME AS KEC_NAME',
                    'CITY.ID as CITY_ID', 'CITY.NAME AS CITY_NAME',
                    'PROVINCE.ID as PROV_ID')
                    ->get();
        $cities = City::all();
        $kecs = Kecamatan::all();
        $kels = Kelurahan::all();
        
        // return $data;
        return view('app.admin.profile.edit', [
            'profiles'=>$data,
            'cities'=>$cities,
            'kecs'=>$kecs,
            'kels'=>$kels,
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
}
