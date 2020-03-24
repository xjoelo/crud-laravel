<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
	// public function __constuct() // VERIFICA QUE ESTE LOGUEADO
	// }
	// 	$this->middleware('auth')
	// {
	    
	
	public function index()
	{
	    $users = User::latest()->get();
	    return view('users.index',[
	    	'users' => $users,
	    ]);
	}

	public function store(StoreUserRequest $request)
	{
		/*dd($request->all());
		$request->validate([
			'name' => ['required'],
			'email' => ['required','email','unique:users'],
			'password' =>['required','min:8']

		]);*/

		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
		]);
		return  back();
	    
	}

	public function destroy(User $user)
	{
		$user->delete();
		return  back();
	    
	}
}
