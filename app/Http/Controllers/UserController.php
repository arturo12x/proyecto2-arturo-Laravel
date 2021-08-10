<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
if(isset($_GET['dato']) && !empty($_GET['dato']) && $_GET['buscar']=='si'){
   
    $users= DB::table('users')->select('id','name','email')
    ->where('name','LIKE','%'.trim($_GET['dato']).'%)')
    ->where('email','LIKE','%'.trim($_GET['dato']).'%)')
    ->orWhere('email','LIKE','%'.trim($_GET['dato']).'%)')
    ->orWhere('id','LIKE','%'.trim($_GET['dato']).'%)')
->paginate(5);
    
}else{
        $users= DB::table('users')->paginate(7);

    }

       $users= DB::table('users')->paginate(7);
        return view('users.index',compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user=DB::table('users')->where('id',$id)->first();
        $roles=Role::all();
        return view('users.edit',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //

$user->roles()->sync($request->roleId);
return redirect()->route('user.edit',$user)->with('info','Se asigno correcmente el rol');
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
