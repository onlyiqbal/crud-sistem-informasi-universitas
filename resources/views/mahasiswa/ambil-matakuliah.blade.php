@extends('layouts.app')
@section('content')
     <div class="pt-3">
          <h1 class="h2">Ambil Matakuliah Untuk Mahasiswa</h1>
     </div>
     <hr>
     <ul>
          <li>Nama : <strong>{{ $mahasiswa->nama }}</strong></li>
          <li>Nomor Induk Mahasiswa : <strong>{{ $mahasiswa->nim }}</strong></li>
          <li>Jurusan : <strong>{{ $mahasiswa->jurusan->nama }}</strong></li>
          <li>Total Matakuliah : 
               <strong>{{ $mahasiswa->matakuliahs->count() }}
                         ({{ $mahasiswa->matakuliahs->sum('jumlah_sks') }} sks)
               </strong>
          </li>
          <hr>
          <h5 class="my-4">Daftar Matakuliah {{ $mahasiswa->jurusan->nama }} yang diambil oleh {{ $mahasiswa->nama }} :</h5>
          <form method="POST" action="{{ route('proses-ambil-matakuliah',['mahasiswa' => $mahasiswa->id]) }}">
               @csrf
               <div class="row">
                    @error('matakuliah.*')
                         <div class="invalid-feedback my-3 d-block">
                              <strong>Error: Pilihan mata kuliah ada yang berulang / bukan dari jurusan {{ $mahasiswa->jurusan->nama }}!</strong>
                         </div>
                    @enderror
                    <div class="col-md-12">
                         @foreach ($matakuliahs as $matakuliah)
                              <div class="mb-2">
                                   <input type="checkbox" name="matakuliah[]" id="matakuliah-{{ $matakuliah->id }}" class="form-check-input" value="{{ $matakuliah->id }}" @if (in_array($matakuliah->id,(old('matakuliah') ?? $matakuliahs_sudah_diambil ?? [] )))
                                        checked
                                   @endif>
                                   <label for= "matakuliah-{{ $matakuliah->id }}" class="form-check-label ms-1">
                                        {{ $matakuliah->nama }}
                                        <small>
                                             (<a href="{{ route('matakuliahs.show',['matakuliah' => $matakuliah->id]) }}">{{ $matakuliah->kode }}</a>)
                                        </small>
                                   </label>
                              </div>
                         @endforeach
                    </div>
               </div>

               <div class="row mt-4">
                    <div class="col-md-6">
                         <button class="btn btn-primary" type="submit">Daftarkan</button>
                    </div>
               </div>
          </form>
     </ul>
@endsection