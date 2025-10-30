<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Create</title>
</head>
<body>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif


    <div class="d-flex justify-content-center">
        <h1 style="width:75%; margin-top:50px;">Tambah pasien</h1>
    </div>


    <div class="d-flexs justify-content-center">
        <form style="width:75%; margin-top:50px;" action="{{route('pasien.store')}}" method="post">
        @csrf
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="mb-3">
  <label for="nama" class="form-label">Nama</label>
  <input type="text" class="form-control @error('nama') is-invalid @enderror"
         name="nama" value="{{ old('nama') }}">
  @error('nama')
    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
  @enderror
</div>

<div class="mb-3">
  <label for="kamar_id" class="form-label">Nomor Kamar</label>
  <select name="kamar_id" class="form-control @error('kamar_id') is-invalid @enderror">
  <option value="">Pilih Kamar</option>
  @foreach($nama_kamar as $kamar)
    <option value="{{ $kamar->id }}" {{ old('kamar_id') == $kamar->id ? 'selected' : '' }}>
      {{ $kamar->nomor_kamar}}
    </option>
  @endforeach
</select>

  @error('kamar_id')
    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
  @enderror
</div>

<div class="mb-3">
  <label for="penyakit" class="form-label">Penyakit</label>
  <input type="text" class="form-control @error('penyakit') is-invalid @enderror"
         name="penyakit" value="{{ old('penyakit') }}">
  @error('penyakit')
    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
  @enderror
</div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <button class="btn btn-secondary"><a href="{{route('pasien.index')}}" style="text-decoration:none; color:white;">Kembali</a></button>
        </form>
    </div>
</body>
</html>
