<!-- resources/views/report/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pertanggal</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Pertanggal - {{ $startDate }} to {{ $endDate }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Departemen</th>
            </tr>
        </thead>
        <tbody>
            @if($issues->isEmpty())
                <tr>
                    <td colspan="8" style="text-align: center;">No records found for the selected date range.</td>
                </tr>
            @else
                @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->nama }}</td>
                    <td>{{ strip_tags($item->deskripsi) }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>{{ $issue->created_at }}</td>
                    <td>{{ $issue->updated_at }}</td>
                    <td>{{ $issue->departemen->nama_departemen }}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
