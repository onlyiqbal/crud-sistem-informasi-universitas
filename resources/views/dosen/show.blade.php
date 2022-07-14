@extends('layouts.app')
@section('content')
     <div class='pt-3 d-flex align-items-center'>
          <h1 class="h2 me-4">Biodata Dosen</h1>
          @auth
               <a href="{{ route('dosens.edit',['dosen' => $dosen->id])}}"
               class="btn btn-secondary me-1" title="Edit Dosen">Edit</a>
               <form action="{{ route('dosens.destroy',
               ['dosen' => $dosen->id]) }}" method="POST" class="d-inline">
               @csrf @method('DELETE')
               <button type="submit" class="btn btn-danger shadow-none btn-hapus"
               title="Hapus Dosen" data-name="{{$dosen->nama}}" data-table="dosen">
               Hapus</button>
               </form>
          @endauth
     </div>
     <hr>
     <ul>
          <li>Nama : <strong>{{ $dosen->nama }}</strong></li>
          <li>NID : <strong>{{ $dosen->nid }}</strong></li>
          <li>Jurusan : <strong>{{ $dosen->jurusan->nama }}</strong></li>
     </ul>
     <p>Mengajar Matakuliah : </p>
     <ol>
          @foreach ($dosen->matakuliahs as $matakuliah)
               <li>
                    {{ $matakuliah->nama }}
                    <small>
                         (<a href="{{ route('matakuliahs.show',['matakuliah' => $matakuliah->id]) }}">{{ $matakuliah->kode }}</a> {{ $matakuliah->jumlah_sks }} SKS )
                    </small>
               </li>
          @endforeach
     </ol>
     @auth
          <a href="{{ route('buat-matakuliah',['dosen' => $dosen->id]) }}" class="btn btn-info" title="Buat Mata Kuliah">Buat Matakuliah</a>
     @endauth
@endsection