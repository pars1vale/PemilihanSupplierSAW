<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print_Testimoni</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Tanggal: {{ $date }}</p>

    <div class="table-responsive">
        <table id="mytable" class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Nama Supplier</th>
                    <th>Rating</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimoni as $t)
                <tr>
                    <td>{{ $t->namabar}}</td>
                    <td>{{ $t->namasup}}</td>
                    <td>{{ $t->rating}}</td>
                    <td>{{ $t->ket}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>