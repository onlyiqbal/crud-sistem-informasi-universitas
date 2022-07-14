<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $dosens = Dosen::with('jurusan')->orderBy('nama')->paginate(5);
        return view('dosen.index',['dosens' => $dosens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('dosen.create',compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nid' => 'required|alpha_num|size:8|unique:dosens,nid',
                'nama' => 'required',
                'jurusan_id' => 'required|exists:App\Models\Jurusan,id',
            ]
        );
        $dosen = Dosen::create($validateData);
        Alert::success('Berhasil',"Dosen $dosen->nama berhasil ditambahkan");
        return redirect($request->url_asal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show',compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        $jurusan = Jurusan::orderBy('nama')->get();
        return view('dosen.edit',['jurusans' => $jurusan,'dosen' => $dosen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validateData = $request->validate(
            [
                'nid' => 'required|alpha_num|size:8|unique:dosens,nid,'.$dosen->id,
                'nama' => 'required',
                'jurusan_id' => 'required|exists:App\Models\Jurusan,id'
            ]
        );

        $dosen->update($validateData);

        Alert::success('Berhasil',"Dosen $dosen->nama telah di update");

        return redirect($request->url_asal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        Alert::success('Berhasil',"Dosen $dosen->nama telah dihapus");
        return redirect('/dosens');
    }
}
