@extends('layouts.app')
@section('content')
     <div class="pt-3">
          <h1 class="h2">Edit Dosen</h1>
     </div>
     <hr>

     <form action="{{ route('dosens.update',['dosen' => $dosen->id]) }}" method="POST">
          @method('PATCH')
          @include('dosen.form',['tombol' => 'Update'])
     </form>
@endsection