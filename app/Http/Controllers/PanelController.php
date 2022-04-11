<?php

namespace App\Http\Controllers;

use App\Models\ArsipSena;
use App\Models\Category;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class PanelController extends Controller
{
    public function unit(UnitKerja $unit, Request $request)
    {
        $pagination  = 5;
        $page    = ArsipSena::when($request->keyword, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $page->appends($request->only('keyword'));
        return view('divisi.unit', [
            'title' => $unit->unit,
            'arsip' => $unit->arsip,
            $unit = UnitKerja::all(),
            'unit' => $unit,
            'page' => $page,
            'category' => Category::all(),
        ]);
    }

    public function createunit(Request $request)
    {
        $pagination  = 5;
        $page    = UnitKerja::when($request->keyword, function ($query) use ($request) {
            $query->where('unit', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $page->appends($request->only('keyword'));
        return view('divisi.create', [
            'unit' => UnitKerja::all(),
            'category' => Category::all(),
            'page' => $page
        ]);
    }

    public function storeunit(Request $request)
    {
        $this->validate($request, [
            'unit' => 'required',
            'keterangan' => 'required',
        ]);

        $unit = UnitKerja::create([
            'unit' => $request->unit,
            'keterangan' => $request->keterangan
        ]);
        if ($unit) {
            return redirect()->route('admin.index')->with(['success' => 'Unit Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('admin.index')->with(['error' => 'Unit Gagal Ditambahkan!']);
        }
    }

    public function createcategory(Request $request)
    {
        $pagination  = 5;
        $page    = Category::when($request->keyword, function ($query) use ($request) {
            $query->where('category', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $page->appends($request->only('keyword'));

        return view('category.create', [
            'page' => $page,
            'category' => Category::all(),
            'unit' => UnitKerja::all(),
        ]);
    }

    public function storecategory(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'keterangan' => 'required',
        ]);

        $category = Category::create([
            'category' => $request->category,
            'keterangan' => $request->keterangan
        ]);
        if ($category) {
            return redirect()->route('createcategory')->with(['success' => 'Category Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('createcategory')->with(['error' => 'Category Gagal Ditambahkan!']);
        }
    }
    public function updatecategory(Request $request, $id)
    {

        $this->validate($request, [
            'category' => 'required',
            'keterangan' => 'required',
        ]);

        $category = Category::find($id);
        $category->category  = $request->category;
        $category->keterangan = $request->keterangan;
        $category->save();
        return redirect()->route('createcategory')->with(['success' => 'Data Berhasil Diupdate!']);
    }
}
