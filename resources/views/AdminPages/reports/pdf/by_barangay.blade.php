<!DOCTYPE html>
<html>
<head>
    <title>Reports by Barangay</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reports by Barangay</h1>
    <p><strong>Total Reports:</strong> {{ $totalReports ?? 0 }}</p>
    <p><strong>Highest Reported Barangay:</strong> {{ $highestBarangay ?? 'N/A' }}</p>
    <table>
        <thead>
            <tr>
                <th>Barangay</th>
                <th>Reports</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->barangay->name ?? 'N/A' }}</td>
                <td>{{ $row->report_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>