<html>
<head>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            height: 50px;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <th>Artikelnummer</th>
        <th>Antal</th>
        <th>Pris</th>
        <th>Fordon</th>
    </thead>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->price }}:-</td>
            <td>{{ str_replace("\n", ',', $item->specs) }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>