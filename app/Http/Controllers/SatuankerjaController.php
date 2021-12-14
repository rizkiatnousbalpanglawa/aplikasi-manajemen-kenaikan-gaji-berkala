<?php

namespace App\Http\Controllers;

use App\Satuankerja;
use Illuminate\Http\Request;

class SatuankerjaController extends Controller
{
    public function index()
    {
        $satuankerja = Satuankerja::all();
        return view('admin/satuan-kerja.index',compact('satuankerja'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Satuankerja::create($data);
        return redirect(route('satuan-kerja'));
    }

    public function destroy(Satuankerja $satuankerja)
    {
        // return $satuankerja;
        Satuankerja::destroy($satuankerja->id);
        return redirect(route('satuan-kerja'));
    }
}
