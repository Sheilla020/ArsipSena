<?php

namespace App\Http\Controllers;

use App\Models\ArsipSena;
use App\Models\Category;
use App\Models\UnitKerja;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    function download($id)
    {
        $arsip = ArsipSena::find($id);
        return view('filearsip.download', compact('arsip'), [
            'unit' => UnitKerja::all(),
            'category' => Category::all()
        ]);
    }
}
