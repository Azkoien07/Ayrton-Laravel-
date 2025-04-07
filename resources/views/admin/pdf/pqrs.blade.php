<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de PQRS</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #F7F8FA;
            color: #2D3748;
            font-size: 12px;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #4A5568;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #FFFFFF;
            border: 1px solid #E2E8F0;
        }

        th, td {
            border: 1px solid #E2E8F0;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4A5568;
            color: #FFFFFF;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background-color: #CBD5E0;
        }

        tr:hover {
            background-color: #E2E8F0;
        }
    </style>
</head>
<body>
    <h2>Reporte de PQRS</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pqrs as $pqr)
                <tr>
                    <td>{{ $pqr->id }}</td>
                    <td>{{ $pqr->title }}</td>
                    <td>{{ ucfirst($pqr->status) }}</td>
                    <td>{{ $pqr->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
