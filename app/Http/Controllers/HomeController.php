<?php

namespace App\Http\Controllers;

use App\DaftarIpVps;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DaftarIpVps::all();
        return view('home', compact('data'));
    }

    public function destroy($id)
    {
        $data = DaftarIpVps::findOrFail($id);
        $data->destroy($id);
        return redirect()->back()->with('status','Data berhasil dihapus');
    }
}
