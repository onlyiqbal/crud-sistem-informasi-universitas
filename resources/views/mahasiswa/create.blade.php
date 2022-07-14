@extends('layouts.app')
@section('content')
     <div class="pt-3">
          <h1 class="h2">Tambah Mahasiswa</h1>
     </div>
     <hr>
     <form action="{{ route('mahasiswas.store') }}" method="POST">
          @include('mahasiswa.form',['tombol' => 'Tambah'])
     </form>
@endsection