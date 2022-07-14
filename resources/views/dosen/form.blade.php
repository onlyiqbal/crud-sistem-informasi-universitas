@csrf
<div class="row mb-3">
     <label for="nid" class="col-md-3 col-form-label text-md-end" title="8 digit angka NID">Nomor Induk Dosen</label>
     <div class="col-md-4">
          <input type="text" name="nid" id="nid" class="form-control @error('nid') is-invalid @enderror" value="{{ old('nid') ?? $dosen->nid  ?? '' }}" placeholder="8 digit angka NID, contoh: 99754972" autofocus>
          @error('nid')
               <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
               </span>
          @enderror
     </div>
</div>

<div class="row mb-3">
     <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Dosen</label>
     <div class="col-md-4">
          <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $dosen->nama  ?? '' }}" autofocus>
          @error('nama')
               <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
               </span>
          @enderror
     </div>
</div>

<div class="row mb-3">
     <label for="jurusan_id" class="col-md-3 col-form-label text-md-end">Jurusan</label>
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
</div>

@isset($dosen)
     <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous().'#row-'.$dosen->id }}">
@else
     <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() }}">
@endisset

<div class="row">
     <div class="col-md-6 offset-md-3">
          <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
     </div>
</div>