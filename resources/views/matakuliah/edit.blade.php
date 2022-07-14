@extends('layouts.app')
@section('content')
     <div class="pt-3">
          <h1 class="h2">Edit Mata Kuliah</h1>
     </div>
     <hr>
     <form action="{{ route('matakuliahs.update',['matakuliah' => $matakuliah->id]) }}" method="POST">
          @method('PATCH')
          @include('matakuliah.form',['tombol' => 'Update'])
     </form>
@endsection