<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users=User::all();
        $users = User::orderBy('id','desc')->paginate(5);
        //dd($user);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        //dd($request);
        $user=new User($request-> all());
        //dd($user);
        $user->save();
        //return 'Usuario Registrado';
        return redirect()
               ->route ('admin.user.index')
               ->with('success','usuario '.$user->name.' creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd($id);
        $user = User::find($id);
        //dd($user);
        return view ('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $user=User::find($id);
        //dd($user);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->save();
        return redirect()
               ->route ('admin.user.index')
               ->with('success','usuario '.$user->name.' editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        $user= User::find($id);
        $user->delete();
        return redirect()
               ->route ('admin.user.index')
               ->with('success','usuario '.$user->name.' eliminado correctamente');
    }

}
