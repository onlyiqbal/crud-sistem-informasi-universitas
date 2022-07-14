@extends('layouts.app')
@section('content')
     <h1 class="display-4 text-center my-5" id="judul">
          Data Dosen {{ $nama_jurusan ?? 'Universitas MIKAR' }}
     </h1>

     <div class="text-end pt-5 pb-4">
          @auth
               <a href="{{ route('dosens.create') }}" class="btn btn-info">Tambah Dosen</a>
          @endauth
     </div>

     <table class="table table-striped">
          <thead>
               <th>#</th>
               <th>NID</th>
               <th>Nama Dosen</th>
               <th>Jurusan Dosen</th>
               @auth
               <th>Action</th>
               @endauth
          </thead>
          <tbody>
               @foreach ($dosens as $dosen)
                    <tr id="row-{{ $dosen->id }}">
                         <th>{{ $dosens->firstItem() + $loop->iteration - 1 }}</th>
                         <td>{{ $dosen->nid }}</td>
                         <td>
                              <a href="{{ route('dosens.show',['dosen' => $dosen->id]) }}">{{ $dosen->nama }}</a>
                         </td>
                         <td>{{ $dosen->jurusan->nama }}</td>
                         @auth
                         <td>
                              <a href="{{ route('dosens.edit',['dosen' => $dosen->id]) }}" class="btn btn-secondary" title="Edit Dosen">Edit</a>
                              <form action="{{ route('dosens.destroy',['dosen' => $dosen->id]) }}" method="POST" class="d-inline">
                                   @csrf @method('DELETE')
                                   <button type="submit" title="Hapus Dosen" class="btn btn-danger shadow-none btn-hapus" data-name={{ $dosen->nama }}data-table="dosen">Hapus</button>
                              </form>
                         </td>
                         @endauth
                    </tr>
               @endforeach
          </tbody>
     </table>
     <div class="row">
          <div class="mx-auto mt-3">
               {{ $dosens->fragment('judul')->links() }}
          </div>
     </div>
@endsection