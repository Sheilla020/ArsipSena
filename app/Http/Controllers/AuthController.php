<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function proses_login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level == '1') {
                return redirect()->intended('admin');
            } elseif ($user->level == '2') {
                return redirect()->intended('user');
            }
            return redirect('dashboard');
        }
        return redirect('login')->withSuccess('Oppes! Silahkan Cek Inputanmu');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }

    public function regis()
    {
        return view('auth.adduser', [
            'unit' => UnitKerja::all(),
            'category' => Category::all(),
            'role' => Role::all()
        ]);
    }
}
