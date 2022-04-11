<?php

namespace App\Http\Controllers;

use App\Models\ArsipSena;
use App\Models\Category;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipSenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filearsip.create', [
            'arsip' => ArsipSena::all(),
            'unit' => UnitKerja::all(),
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $request->validate([
                'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,xlsx,docx,pdf|max:2048',
            ]);

            $fileName = $request->file->getClientOriginalName();
            $filesize = $request->file->getSize();
            $extension = $request->file->getClientOriginalExtension();


            $request->file->move(public_path('stored'), $fileName);

            $this->validate($request, [
                'category_id' => 'required',
                'no_dokumen' => 'required',
                'prihal' => 'required',
                'keterangan' => 'required',
                'nama_pengirim'  => 'required',
                'unit_kerja_id' => 'required',
                'perusahaan_pengirim' => 'required',
                'tgl_upload' => 'required',
            ]);

            $arsip = ArsipSena::create([
                'category_id'  => $request->category_id,
                'no_dokumen'  => $request->no_dokumen,
                'prihal'  => $request->prihal,
                'keterangan' => $request->keterangan,
                'nama_pengirim' => $request->nama_pengirim,
                'file' => $fileName,
                'filesize' => $filesize,
                'extension' => $extension,
                'unit_kerja_id' => $request->unit_kerja_id,
                'perusahaan_pengirim' => $request->perusahaan_pengirim,
                'tgl_upload' => $request->tgl_upload,

            ])->with('file', $fileName);;

            if ($arsip) {
                return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                return redirect()->route('admin.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArsipSena  $arsipSena
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsip = ArsipSena::find($id);
        return view('filearsip.show', compact('arsip'), [
            'unit' => UnitKerja::all(),
            'category' => Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArsipSena  $arsipSena
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arsip = ArsipSena::find($id);
        return view('filearsip.edit', compact('arsip'), [
            'unit' => UnitKerja::all(),
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArsipSena  $arsipSena
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArsipSena $arsip)
    {
        $this->validate($request, [
            'status' => 'required',
            'category_id' => 'required',
            'no_dokumen' => 'required',
            'prihal' => 'required',
            'keterangan' => 'required',
            'nama_pengirim'  => 'required',
            'unit_kerja_id' => 'required',
            'perusahaan_pengirim' => 'required',
        ]);

        //get data Arsip by ID
        $arsip = ArsipSena::findOrFail($arsip->id);

        if ($request->file('file') == "") {

            $arsip->update([
                'status' => $request->status,
                'category_id' => $request->category_id,
                'no_dokumen' => $request->no_dokumen,
                'prihal' => $request->prihal,
                'keterangan' => $request->keterangan,
                'nama_pengirim'  => $request->nama_pengirim,
                'unit_kerja_id' => $request->unit_kerja_id,
                'perusahaan_pengirim' => $request->perusahaan_pengirim,
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('stored/' . $arsip->file);

            //upload new image
            $fileName = $request->file->getClientOriginalName();
            $filesize = $request->file->getSize();
            $extension = $request->file->getClientOriginalExtension();

            $request->file->move(public_path('stored'), $fileName);

            $arsip->update([
                'file'     => $fileName,
                'filesize' => $filesize,
                'extension' => $extension,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'no_dokumen' => $request->no_dokumen,
                'prihal' => $request->prihal,
                'keterangan' => $request->keterangan,
                'nama_pengirim'  => $request->nama_pengirim,
                'unit_kerja_id' => $request->unit_kerja_id,
                'perusahaan_pengirim' => $request->perusahaan_pengirim
            ]);
        }

        if ($arsip) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArsipSena  $arsipSena
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsip = ArsipSena::findOrFail($id);
        $arsip->delete();
        return redirect('admin')->with(['success' => 'Data Berhasil Dihapus!']);;
    }

    public function trash()
    {
        $arsip = ArsipSena::onlyTrashed()->paginate(10);
        return view('filearsip.trash', [
            'arsip' => $arsip,
            'unit' => UnitKerja::all(),
            'category' => Category::all()
        ]);
    }

    public function restore($id)
    {
        $arsip = ArsipSena::withTrashed()->findOrFail($id);
        if ($arsip->trashed()) {

            $arsip->restore();

            return redirect()->route('trash')->with('success', 'Data successfully restored');
        } else {

            return redirect()->route('trash')->with('error', 'Data is not in trash');
        }
    }

    public function deletePermanent($id)
    {
        $arsip = ArsipSena::withTrashed()->findOrFail($id);
        Storage::delete('stored/' . $arsip->file);
        if (!$arsip->trashed()) {
            return redirect()->route('trash')->with(['success', 'Data is noting trash!']);
        } else {
            $arsip->forceDelete();
            return redirect()->route('trash')->with(['error', 'Data permanently deleted!']);
        }
    }
}
