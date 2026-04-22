<!DOCTYPE html>
<html>
<head>
    <title>Evacuees by Calamity</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Evacuees by Calamity</h1>
    <p><strong>Total Evacuees:</strong> {{ $totalEvacuees ?? 0 }}</p>
    <p><strong>Highest Calamity:</strong> {{ $highestCalamity ?? 'N/A' }}</p>
    <table>
        <thead>
            <tr>
                <th>Calamity</th>
                <th>Total Evacuees</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->calamity->name ?? 'N/A' }}</td>
                <td>{{ $row->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>