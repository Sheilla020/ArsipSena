<?php

namespace App\Http\Controllers;

use App\Models\ArsipSena;
use App\Models\Category;
use App\Models\Role;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination  = 5;
        $arsip    = ArsipSena::when($request->keyword, function ($query) use ($request) {
            $query->where('prihal', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $arsip->appends($request->only('keyword'));
        return view('dashboard', [
            'arsip' => $arsip,
            'unit' => UnitKerja::all(),
            'category' => Category::all(),
            $user = User::all(),
            'user' => $user,
            'role' => Role::all(),

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $this->validate($request, [
            'username' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'unit_kerja_id' => 'required',
            'level' => 'required'
        ]);

        $user = User::create([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password,
            'unit_kerja_id' => $request->unit_kerja_id,
            'status' =>  $request->status,
            'level' =>  $request->level,

        ])->with('image', $imageName);;

        if ($user) {
            return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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

    function download($file)
    {
        $filename = public_path('stored/' . $file);
        return view('dashboard');
    }
}
