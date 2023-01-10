<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anuncio;

use App\Http\Controllers\Auth;


class UserController extends Controller
{
    //
    public function index()
    {
      $users= User::paginate(4);
      $anuncios=Anuncio::all();  
       return view('users.index',compact('users','anuncios'));
        //
    }

    public function show(User $user)
    {
        return view('users.show',['user' => $user]);
        //
    }
 
    
    public function edit(User $user)
    {
        return view('users.edit',['user' => $user]);
        //
    }


    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect('/users');
    }

    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect('/users');
    }
}


