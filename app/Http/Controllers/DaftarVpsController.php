<?php

namespace App\Http\Controllers;

use App\DaftarIpVps;
use Validator;
use Illuminate\Http\Request;

class DaftarVpsController extends Controller
{
    public function index()
    {
        return view('daftar.index');
    }

    public function store(Request $request)
    {
        $created_at = date('Y-m-d');
        $expired_at = date('Y-m-d', strtotime('+1 month', strtotime($created_at)));
        $validator = Validator::make($request->all(), [
            'nama' => 'requied',
            'ipkamu' => 'required'
        ]);
        $cekData = DaftarIpVps::where('ipkamu', $request->ipkamu)->count();
        if ($cekData > 0) {
            return redirect()->back()->with('warning','Data yang kamu masukkan sudah ada');
        }
        $data = [
            'nama' => $request->nama,
            'ipkamu' => $request->ipkamu,
            'created' => $created_at,
            'expired' => $expired_at,
        ];
        DaftarIpVps::create($data);
        return redirect()->back()->with('success','Data berhasil disimpan');
    }

    public function lihatpengguna()
    {
        $data = DaftarIpVps::all();
        return view('daftar.lihatpengguna', compact('data'));
    }

    public function ipakses()
    {
        $data = DaftarIpVps::all();
        return view('daftar.ipakses', compact('data'));
    }
}
