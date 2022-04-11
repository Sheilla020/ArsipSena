<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $pagination  = 5;
        $user    = User::when($request->keyword, function ($query) use ($request) {
            $query->where('full_name', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $user->appends($request->only('keyword'));
        return view('user.index', [
            'user' => $user,
            'unit' => UnitKerja::all(),
            'category' => Category::all(),
        ]);
    }

    public function home()
    {
        return view('dashboard');
    }
}
