<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->where('password', md5($request->password))->first();
        if (isset($user->username)) {
            $user->last_login = Carbon::now();
            $user->save();
            session(['username' => $user->username]);
            return redirect('admin/proyek');
        }else{
            return back()->with(['failed', 'Username atau Password anda salah']);
        }
    }

    function destroy(Request $request){
		session()->flush();
		return redirect('/');
	}
}
