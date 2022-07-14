@extends('layouts.app')
@section('content')
     <div class="pt-3">
          <h1 class="h2">Edit Mahasiswa</h1>
     </div>
     <hr>

     <form action="{{ route('mahasiswas.update',['mahasiswa' => $mahasiswa->id]) }}" method="POST">
          @method('PATCH')
          @include('mahasiswa.form',['tombol' => 'Update'])
     </form>
@endsection