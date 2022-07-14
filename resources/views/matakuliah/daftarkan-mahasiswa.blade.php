@extends('layouts.app')
@section('content')
     <div class="pt-3">
          <h1 class="h2">Daftarkan Mahasiswa ke Mata Kuliah</h1>
     </div>
     <hr>
     <ul>
          <li>Nama : <strong>{{ $matakuliah->nama }}</strong></li>
          <li>Kode Mata Kuliah : <strong>{{ $matakuliah->kode }}</strong></li>
          <li>Dosen Pengajar :
               <strong>
                    <a href="{{ route('dosens.show',['dosen' => $matakuliah->dosen->id]) }}">{{ $matakuliah->dosen->nama }}</a>
               </strong>
          </li>
          <li>Jurusan : <strong>{{ $matakuliah->jurusan->nama }}</strong></li>
          <li>Jumlah SKS : <strong>{{ $matakuliah->jumlah_sks }}</strong></li>
          <li>Total Mahasiswa : 
               <strong>{{ count($mahasiswas_sudah_terdaftar) }}</strong>
          </li>
     </ul>
     <hr>
     <h5 class="mt-5 mb-4">Daftar mahasiswa {{ $matakuliah->jurusan->nama }} yang mengambil mata kuliah {{ $matakuliah->nama }}</h5>
     <form action="{{ route('proses-daftarkan-mahasiswa',['matakuliah' => $matakuliah->id]) }}" method="POST">
          @csrf
          <div class="form-group row">
               @error('mahasiswa.*')
                    <div class="invalid-feedback my-3 d-block ml-3">
                         <strong>Error : Pilihan mahasiswa ada yang berulang / bukan dari {{ $matakuliah->jurusan->nama }}</strong>
                    </div>
               @enderror
               <div class="col-md-12">
                    @foreach ($mahasiswas as $mahasiswa)
                         <div class="custom-control custom-checkbox mb-2">
                              <input type="checkbox" name="mahasiswa[]" id="mahasiswa{{ $mahasiswa->id }}" value="{{ $mahasiswa->id }}" @if (in_array($mahasiswa->id,(old('mahasiswa') ?? $mahasiswas_sudah_terdaftar ?? [] )))
                                   checked
                              @endif>
                              <label  class="custom-control-label" for="mahasiswa{{ $mahasiswa->id }}">
                                   {{ $mahasiswa->nama }}
                                   <small>
                                        (<a href="{{ route('mahasiswas.show',['mahasiswa' => $mahasiswa->id]) }}">{{ $mahasiswa->nim }}</a>)
                                   </small>
                              </label>
                         </div>
                    @endforeach
               </div>
          </div>

          <div class="form-group row mt-4">
               <div class="col-md-6">
                    <button  type="submit" class="btn btn-primary">Daftarkan</button>
               </div>
          </div> 
     </form>
@endsection