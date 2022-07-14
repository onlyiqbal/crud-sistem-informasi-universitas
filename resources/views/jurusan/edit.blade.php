@extends('layouts.app')
@section('content')
     <div class="pt-3">
          <h1 class="h2">Edit Jurusan</h1>
     </div>
     <hr>

     <form action="{{ route('jurusans.update',['jurusan' => $jurusan->id]) }}" method="POST">
          @method('PATCH')
          @include('jurusan.form',['tombol' => 'Update'])
     </form>
@endsection