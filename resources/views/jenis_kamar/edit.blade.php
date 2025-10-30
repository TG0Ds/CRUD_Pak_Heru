<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    
    <title>update</title>
</head>
<body>
    <div class="flex justify-content-center">
        <h1 style="width:75%; margin-top:50px;">Edit pasien</h1>
    </div>

    <div class="d-flex justify-content-center">
        <form style="width:75%; margin-top:50px;" action="{{route('jenis_kamar.update', $jenis_kamar->id)}}" method="post">
        @csrf
        @method('PUT')
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

                          @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

    <div class="mb-3">
        <label for="nama_jenis" class="form-label">Jenis Kamar</label>
        <input type="text" class="form-control" @error('nama_jenis') is-invalid @enderror name="nama_jenis" value="{{ old('nama_jenis', $jenis_kamar->nama_jenis) }}">
            @error('nama_jenis')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="harga_per_malam" class="form-label">Harga Per Malam</label>
        <input type="text" class="form-control" @error('harga_per_malam') is-invalid @enderror name="harga_per_malam" value="{{ old('harga_per_malam', $jenis_kamar->harga_per_malam) }}">
            @error('harga_per_malam')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>