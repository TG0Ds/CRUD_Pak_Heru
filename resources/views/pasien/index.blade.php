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
        <h1 style="width:75%; margin-top:50px;">List pasien</h1>
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
<button class="btn btn-primary"><a href="{{route('nama_kamar.index')}}" style="text-decoration:none; color:white;">Lihat Kamar</a></button>
<button class="btn btn-primary"><a href="{{route('jenis_kamar.index')}}" style="text-decoration:none; color:white;">Lihat Jenis Jenis Kamar</a></button>
    <table class="table" style="width:75%; margin-top:50px;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Penyakit</th>
            <th scope="col">nomor kamar</th>
            <th scope="col">Jenis Kamar</th>
            <th scope="col">Harga Per Malam ($)</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
            @if (!empty($pasien) && $pasien->count() > 0)

                @foreach ($pasien as $key=>$pasien)
                    <tr>
                        <th scope="row">{{$pasien->id}}</th>
                        <td>{{$pasien->nama}}</td>
                        <td>{{$pasien->penyakit}}</td>
                        <td>{{$pasien->nama_kamar->nomor_kamar ?? '_'}}</td>
                        <td>{{$pasien->nama_kamar->jenisKamar->nama_jenis ?? '_'}}</td>
                        <td>{{$pasien->nama_kamar->jenisKamar->harga_per_malam ?? '_'}}</td>
                        <td>
                            <a href="{{route('pasien.edit', $pasien->id)}}"> <button class="btn btn-outline-success my-1">Edit</button></a> 
                        <form action="{{route('pasien.destroy', $pasien->id)}}" method="POST"> 
                            @csrf
                            {{method_field('DELETE') }} 
                            <button class="btn btn-outline-danger my-1">Delete
                            </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                @else
                <td>Tidak ada pasien yang dapat ditampilkan</td>
            
                @endif
        </tbody>
        <button class="btn btn-primary"><a href="{{route('pasien.create')}}" style="text-decoration:none; color:white;">Tambah pasien</a></button>
      </table>
</body>
</html>
