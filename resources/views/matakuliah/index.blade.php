@extends('layouts.app')
@section('content')
     <h1 class="display-4 text-center my-5" id="judul">
          Matakuliah {{ $nama_jurusan ?? 'Universitas MIKAR' }}
     </h1>

     <div class="text-end pt-5 pb-4">
          <a href="{{ route('matakuliahs.create') }}" class="btn btn-info">Tambah Matakuliah</a>
     </div>

     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama Matakuliah</th>
                    <th>Dosen Pengajar</th>
                    <th>Jumlah SKS</th>
                    <th>Jurusan</th>
                    @auth
                    <th>Action</th>
                    @endauth
               </tr>
          </thead>
          <tbody>
               @foreach ($matakuliahs as $matakuliah)
                    <tr id="row-{{ $matakuliah->id }}">
                         <th>{{ $matakuliahs->firstItem() + $loop->iteration - 1  }}</th>
                         <td>{{ $matakuliah->kode }}</td>
                         <td>
                              <a href="{{ route('matakuliahs.show',['matakuliah' => $matakuliah->id]) }}">{{ $matakuliah->nama }}</a>
                         </td>
                         <td>
                              <a href="{{ route('dosens.show',['dosen' => $matakuliah->dosen->id]) }}">{{ $matakuliah->dosen->nama }}</a>
                         </td>
                         <td>{{ $matakuliah->jumlah_sks }}</td>
                         <td>{{ $matakuliah->jurusan->nama }}</td>
                         @auth
                         <td>
                              <a href="{{ route('matakuliahs.edit',['matakuliah' => $matakuliah->id]) }}" class="btn btn-secondary" title="Edit Matakuliah">Edit</a>
                              <form action="{{ route('matakuliahs.destroy',['matakuliah' => $matakuliah->id]) }}" method="POST" class="d-inline">
                                   @csrf @method('DELETE')
                                   <button type="submit" class="btn btn-danger shadow-none btn-hapus" title="Hapus Matakuliah" data-name="{{ $matakuliah->nama }}">Hapus</button>
                              </form>
                         </td>
                         @endauth
                    </tr>
               @endforeach
          </tbody>
     </table>
     <div class="row">
          <div class="mx-auto mt-3">
               {{ $matakuliahs->fragment('judul')->links() }}
          </div>
     </div>
@endsection