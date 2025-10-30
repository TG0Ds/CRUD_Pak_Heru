<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Read</title>
</head>
<body>
    <div class="d-flex justify-content-center">
        <h1 style="width:75%; margin-top:50px;">List Jenis Kamar</h1>
    </div>

    <div class="d-flex justify-content-center">
        <div style="width:75%; margin-top:50px;">
            @csrf
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>
    </div>
    <a class="btn btn-secondary" href="{{ route('pasien.index') }}">Kembali</a>
    <a class="btn btn-primary" href="{{ route('jenis_kamar.create') }}">Tambah jenis kamar</a>
    <table class="table" style="width:75%; margin-top:50px;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Jenis Kamar</th>
            <th scope="col">Harga Per Malam ($)</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
            @if (!empty($jenis_kamar) && $jenis_kamar->count() > 0)

                @foreach ($jenis_kamar as $key=>$jenis_kamar)
                    <tr>
                        <th scope="row">{{$jenis_kamar->id}}</th>
                        <td>{{$jenis_kamar->nama_jenis}}</td>
                        <td>{{$jenis_kamar->harga_per_malam}}</td>
                        <td>
                            <a href="{{route('jenis_kamar.edit', $jenis_kamar->id)}}"> <button class="btn btn-outline-success my-1">Edit</button></a> 
                        <form action="{{route('jenis_kamar.destroy', $jenis_kamar->id)}}" method="POST"> 
                            @csrf
                            {{method_field('DELETE') }} 
                            <button class="btn btn-outline-danger my-1">Delete
                            </button>
</form>
                        </td>
                    </tr>
                @endforeach
                @else
                <td>Tidak ada jenis kamar yang dapat ditampilkan</td>
            
                @endif
        </tbody>
      </table>
</body>
</html>
