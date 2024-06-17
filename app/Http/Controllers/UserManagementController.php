<?php

namespace App\Http\Controllers;


use App\Models\User;
// use Illuminate\Foundation\Auth\User; // meka waradi user model eka thama use karana oni me file eke has role eka dala ne ne api
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view ('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
           'name'=>'required',
           'role'=>'required',
        ]);

        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password) ;

        $user->save();

        $user->assignRole([$request->role]);

        return redirect(route('users.index'));



        // Mass assignment
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =User::find($id);
        return view ('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'role'=>'required',
         ]);
 
         $user =User::find($id);
         $user->name= $request->name;
         $user->email= $request->email;
         
         $user->save();
 
         $user->syncRole([$request->role]);
 
         return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
