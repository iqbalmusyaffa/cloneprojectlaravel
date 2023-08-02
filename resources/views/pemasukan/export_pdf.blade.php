<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pemasukan</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>Data Pemasukan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Nominal</th>
                <th>Deskripsi</th>
                <th>Tanggal pemasukan</th>
            </tr>
        </thead>
        <tbody>
                @php
                $counter = 1;
            @endphp

                @foreach ($pemasukan as $pemasukans)
                <tr>
                    <td align="center">{{ $counter }}</td>
                    <td>{{ $pemasukans->kategorimasuk->nama_kategori }}</td>
                    <td>{{ $pemasukans->nominal	}}</td>
                    <td>{{ $pemasukans->deskripsi }}</td>
                    <td>{{ $pemasukans->tanggal_pemasukan }}</td>
                </tr>
                @php
                $counter++;
            @endphp
                @endforeach
        </tbody>
    </table>
</body>
</html>
