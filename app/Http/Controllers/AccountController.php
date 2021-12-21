<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDO;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                   
        $dataTable = new Account();        
        $page = 15;

        if ($this->isRoleName('ADMIN')) {
            $page=5;
            $data = DB::table('ViewAccount')
            ->paginate($page);
        }else if($this->isRoleName('OWNER')){
            $data =  DB::table('ViewAccount')
            ->where('role_name', '=', 'MANAGER')
            ->where('manager_id', '=', auth()->user()->id)
            ->paginate($page);
        }else if($this->isRoleName('MANAGER')){
            $data = DB::table('ViewAccount')
            ->where('role_name', '=', 'EMPLOYEE')
            ->where('manager_id', '=', auth()->user()->id)
            ->paginate($page);
        }else{
            return view('forbidden');
        }

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
        $dataTable = new Account();
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
        $this->validate($request, [
            'username' => 'required|alpha_dash|string|max:50|unique:account',
            'email' => 'required|string|email|max:255|unique:account',
            'password' => 'required|string|min:2',
        ]);
        
        $account = new Account;
        $account->username =$request->username;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);

        if ($this->isRoleName('ADMIN')) {
            $account->role_name = $request->role_name;
        }else if($this->isRoleName('OWNER')){
            $account->role_name = 'MANAGER';
        }else if($this->isRoleName('MANAGER')){
            $account->role_name = 'EMPLOYEE';
        }
        
        $account->account_id = auth()->user()->id;
        $account->isActive = 1;
        
        try{
            $account->save();
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->back()->with('status', 'Success add a account!');
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
        $data = Account::where('id', $id)
        ->select('username', 'email', 'account_id', 'role_name')
        ->first();

        $dataTable = new Account();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $acc = Account::find($id);
        $acc->username = $request->username;
        $acc->email = $request->email;
        $acc->role_name = $request->role_name;
        $acc->account_id = $request->account_id;
        try{
            $acc->save();
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage())->withInput();
        }

        return redirect()->back()->with('status', 'Success update account!');
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
        $acc = Account::find($id);
        $acc->isActive = 0;
        $acc->save();

        return redirect()->back()->with('status', 'Success non-actived account!');
    }


    public function isRoleName($role_name){
        return auth()->user()->role_name == $role_name;
    }
}
