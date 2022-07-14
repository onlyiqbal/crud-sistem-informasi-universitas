@extends('layouts.app')
@section('content')

<div class="pt-3">
  <h1 class="h2">Tambah Mata Kuliah</h1>
</div>
<hr>

<form method="POST" action="{{ route('matakuliahs.store') }}">
  @include('matakuliah.form',['tombol' => 'Tambah'])
</form>

@endsection
