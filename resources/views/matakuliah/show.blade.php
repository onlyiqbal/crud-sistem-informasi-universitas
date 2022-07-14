@extends('layouts.app')
@section('content')
     <div class="pt-3 d-flex align-items-center">
          <h1 class="h2 me-4">Informasi Matakuliah</h1>
          @auth
               <a href="{{ route('matakuliahs.edit',['matakuliah' => $matakuliah->id])}}"
               class="btn btn-secondary me-1" title="Edit Matakuliah">Edit</a>
               <form action="{{ route('matakuliahs.destroy',
               ['matakuliah' => $matakuliah->id]) }}" method="POST" class="d-inline">
               @csrf @method('DELETE')
               <button type="submit" class="btn btn-danger shadow-none btn-hapus"
               title="Hapus Matakuliah" data-name="{{$matakuliah->nama}}" data-table="matakuliah">
               Hapus</button>
               </form>
          @endauth
     </div>
     <hr>
     <ul>
          <li>Nama : <strong>{{ $matakuliah->nama }}</strong></li>
          <li>Kode Matakuliah : <strong>{{ $matakuliah->kode }}</strong></li>
          <li>Dosen Pengajar : 
               <strong>
                    <a href="{{ route('dosens.show',['dosen' => $matakuliah->dosen->id]) }}">{{ $matakuliah->dosen->nama }}</a>
               </strong>
          </li>
          <li>Jurusan : <strong>{{ $matakuliah->jurusan->nama }}</strong></li>
          <li>Jumlah SKS : <strong>{{ $matakuliah->jumlah_sks }}</strong></li>
          <li>Total Mahasiswa : <strong>{{ count($mahasiswas) }}</strong></li>
     </ul>
     <p>Daftar Mahasiswa : </p>
     <ol>
          @foreach ($mahasiswas as $mahasiswa)
               <li>
                    {{ $mahasiswa->nama }}
                    <small>
                         (<a href="{{ route('mahasiswas.show',['mahasiswa' => $mahasiswa->id]) }}">{{ $mahasiswa->nim }}</a>)
                    </small>
               </li>
          @endforeach
     </ol>
     @auth
          <a href="{{ route('daftarkan-mahasiswa',['matakuliah' => $matakuliah->id]) }}" class="btn btn-info" title="Daftakan Mahasiswa">Daftakan Mahasiswa</a>
     @endauth
@endsection