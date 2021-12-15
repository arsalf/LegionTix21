<?php

namespace App\Http\Controllers;

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
        $data->no_hp = $request->no_telp;
        $data->account_id = auth()->user()->id;
        $data->village_id = $request->kelurahan;
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
                    ->join('VILLAGE', 'VILLAGE.ID', '=', 'PROFILE.VILLAGE_ID')
                    ->join('DISTRICT', 'DISTRICT.ID', '=', 'VILLAGE.DISTRICT_ID')
                    ->join('CITY', 'CITY.ID', '=', 'DISTRICT.CITY_ID')
                    ->join('REGION', 'REGION.ID', '=', 'CITY.REGION_ID')
                    ->select('PROFILE.*', 
                    'VILLAGE.ID as KEL_ID', 'VILLAGE.NAME AS KEL_NAME',
                    'DISTRICT.ID as KEC_ID', 'DISTRICT.NAME AS KEC_NAME',
                    'CITY.ID as CITY_ID', 'CITY.NAME AS CITY_NAME',
                    'REGION.ID as PROV_ID', 'REGION.NAME as PROV_NAME',)
                    ->get();
        
        // return $data;
        return view('app.admin.profile.edit', [
            'profiles'=>$data
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
        Profile::where('account_id', $id)->update([            
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'birth_date'=>$request->birth_date,
            'address'=>$request->address,
            'no_hp'=>$request->no_telp,
            'village_id'=>$request->kelurahan,
        ]);
        
        return redirect()->route('profile.index')->with('status', 'Success update profile!');
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
