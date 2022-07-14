@csrf
<div class="row mb-3">
     <label for="nim" class="col-md-3 col-form-label text-md-end">Nomor Induk Mahasiswa</label>
     <div class="col-md-4">
          <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') ?? $mahasiswa->nim ?? '' }}" placeholder="8 digit angka NIM, contoh: 10311492" autofocus>
          @error('nim')
               <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
               </span>
          @enderror
     </div>
</div>

<div class="row mb-3">
     <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Mahasiswa</label>
     <div class="col-md-4">
          <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $mahasiswa->nama ?? '' }}">
          @error('nama')
               <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
               </span>
          @enderror
     </div>
</div>

<div class="row mb-3">
     <label for="jurusan_id" class="col-md-3 col-form-label text-md-end">Jurusan</label>
     @if (($tombol == 'Update') && ($mahasiswa->matakuliahs->count() > 0 ))
          <div class="col-md-9 d-flex align-items-center">
               <div>{{ $mahasiswa->jurusan->nama }}
                    <small><i>(tidak bisa diubah karena sudah mengambil {{ $mahasiswa->matakuliahs->count() }} mata kuliah)</i></small>
               </div>
          </div>
          <input type="hidden" name="jurusan_id" id="jurusan_id" value="{{ $mahasiswa->jurusan_id }}">
     @else
          <div class="col-md-4">
          <select name="jurusan_id" id="jurusan_id" class="form-select @error('jurusan_id') is-invalid @enderror">
               @foreach ($jurusans as $jurusan)
                    @if ($jurusan->id == (old('jurusan_id') ?? $dosen->jurusan_id ?? ''))
                         <option value="{{ $jurusan->id }}" selected>{{ $jurusan->nama }}</option>
                    @else
                         <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                    @endif
               @endforeach
          </select>
          @error('jurusan_id')
               <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
               </span>
          @enderror
     </div>
     @endif
</div>

@isset($mahasiswa)
     <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous().'#row-'.$mahasiswa->id }}">
@else
     <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() }}">
@endisset

<div class="row">
     <div class="col-md-6 offset-md-3">
          <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
     </div>
</div>