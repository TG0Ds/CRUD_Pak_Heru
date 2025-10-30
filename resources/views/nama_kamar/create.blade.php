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


    <div class="d-flex justify-content-center">
        <h1 style="width:75%; margin-top:50px;">Tambah Kamar</h1>
    </div>


    <div class="d-flexs justify-content-center">
        <form style="width:75%; margin-top:50px;" action="{{route('nama_kamar.store')}}" method="post">
        @csrf
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="mb-3">
  <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
  <input type="text" class="form-control @error('nomor_kamar') is-invalid @enderror"
         name="nomor_kamar" value="{{ old('nomor_kamar') }}">
  @error('nomor_kamar')
    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
  @enderror
</div>

<div class="mb-3">
  <label for="jenis_kamar_id" class="form-label">Jenis Kamar</label>
  <select name="jenis_kamar_id" class="form-control @error('jenis_kamar_id') is-invalid @enderror">
  <option value="">Pilih Jenis Kamar</option>
  @foreach($jenis_kamar as $Jenis_Kamar) 
    <option value="{{ $Jenis_Kamar->id }}" {{ old('jenis_kamar_id') == $Jenis_Kamar->id ? 'selected' : '' }}>
      {{ $Jenis_Kamar->nama_jenis }}
    </option>
  @endforeach
</select>

  @error('jenis_kamar_id')
    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
  @enderror
</div>

            <button type="submit" class="btn btn-primary">Tambah</button>
            <button class="btn btn-secondary"><a href="{{route('nama_kamar.index')}}" style="text-decoration:none; color:white;">Kembali</a></button>
        </form>
    </div>
</body>
</html>
