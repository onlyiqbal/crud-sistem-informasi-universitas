<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MatakuliahController extends Controller
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
        $matakuliahs = Matakuliah::with('jurusan','dosen')->orderBy('nama')->paginate(10);
        return view('matakuliah.index',['matakuliahs' => $matakuliahs]);
    }

    public function buatMatakuliah(Dosen $dosen)
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('matakuliah.create',[
            'dosen' => $dosen,
            'jurusans' => $jurusans,
        ]);
    }

    public function daftarkanMahasiswa(Matakuliah $matakuliah){
        $mahasiswas = Mahasiswa::where('jurusan_id',$matakuliah->jurusan_id)->orderBy('nama')->get();

        $mahasiswas_sudah_terdaftar = $matakuliah->mahasiswas->pluck('id')->all();

        return view('matakuliah.daftarkan-mahasiswa',
            [
                'matakuliah' => $matakuliah,
                'mahasiswas' => $mahasiswas,
                'mahasiswas_sudah_terdaftar' => $mahasiswas_sudah_terdaftar
            ]
        );
    }

    public function prosesDaftarkanMahasiswa(Request $request, Matakuliah $matakuliah){
        $mahasiswa_jurusan = Mahasiswa::where('jurusan_id',$matakuliah->jurusan_id)->pluck('id')->toArray();

        $validateData = $request->validate(
            [
                'mahasiswa.*' => 'distinct|in:'.implode(',',$mahasiswa_jurusan),
            ]
        );

        $matakuliah->mahasiswas()->sync($validateData['mahasiswa'] ?? []);

        Alert::success('Berhasil','Terdapat '.count($validateData['mahasiswa'] ?? [])." mahasiswa yang mengambil $matakuliah->nama");

        return redirect(route('matakuliahs.show',['matakuliah' => $matakuliah->id]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        $dosens = Dosen::orderBy('nama')->get();
        return view('matakuliah.create',[
            'jurusans' => $jurusans,
            'dosens' => $dosens,
        ]);
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
                'kode' => 'required|alpha_num|size:5|unique:matakuliahs,kode',
                'nama' => 'required',
                'dosen_id' => 'required|exists:App\Models\Dosen,id',
                'jurusan_id' => 'required|exists:App\Models\Jurusan,id',
                'jumlah_sks' => 'required|digits_between:1,6',
            ]
        );
        Matakuliah::create($validateData);
        Alert::success('Berhasil',"Matakuliah $request->nama berhasil dibuat");
        return redirect($request->url_asal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        $mahasiswas = $matakuliah->mahasiswas->sortBy('nama');

        return view('matakuliah.show',[
            'matakuliah' => $matakuliah,
            'mahasiswas' => $mahasiswas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        $dosens = Dosen::orderBy('nama')->get();

        return view('matakuliah.edit',
        [
            'matakuliah' => $matakuliah,
            'dosens' => $dosens,
            'jurusans' => $jurusans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validateData = $request->validate(
            [
                'kode' => 'required|alpha_num|size:5|unique:matakuliahs,kode,'.$matakuliah->id,
                'nama' => 'required',
                'dosen_id' => 'required|exists:App\Models\Dosen,id',
                'jurusan_id' => 'required|exists:App\Models\Jurusan,id',
                'jumlah_sks' => 'required|digits_between:1,6'
            ]
        );

        if (($matakuliah->mahasiswas()->count() > 0) && ($matakuliah->jurusan_id != $request->jurusan_id)) {
            Alert::error('Gagal','Jurusan tidak bisa diubah');
            return back();
        }

        $matakuliah->update($validateData);
        Alert::success('Berhasil',"Matakuliah $request->nama telah diupdate");
        return redirect($request->url_asal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        Alert::success('Berhasil',"Matakuliah $matakuliah->nama telah dihapus");
        return redirect('/matakuliahs');
    }
}
