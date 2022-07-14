@csrf
<div class="row mb-3">
     <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Jurusan</label>
     <div class="col-md-4">
          <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $jurusan->nama ?? '' }}" autofocus>
          @error('nama')
          <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
          </span>
     @enderror
     </div>
</div>

<div class="row mb-3">
     <label for="kepala_jurusan" class="col-md-3 col-form-label text-md-end">Nama Kepala Jurusan</label>
     <div class="col-md-4">
          <input type="text" name="kepala_jurusan" id="kepala_jurusan" class="form-control @error('kepala_jurusan') is-invalid @enderror" value="{{ old('kepala_jurusan') ?? $jurusan->kepala_jurusan ?? '' }}" autofocus>
          @error('kepala_jurusan')
          <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
          </span>
     @enderror
     </div>
</div>

<div class="row mb-3">
     <label for="daya_tampung" class="col-md-3 col-form-label text-md-end">Daya Tampung</label>
     <div class="col-md-4">
          <input type="text" name="daya_tampung" id="daya_tampung" class="form-control @error('daya_tampung') is-invalid @enderror w-25" value="{{ old('daya_tampung') ?? $jurusan->daya_tampung ?? '' }}" autofocus>
          @error('daya_tampung')
          <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
          </span>
     @enderror
     </div>
</div>

<div class="row">
     <div class="col-md-6 offset-md-3">
          <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
     </div>
</div>