<html>
<body>
<table>
    <thead>
        <th>Artikel Nummer</th>
        <th>Antal</th>
        <th>Pris</th>
        <th>Fordon</th>
    </thead>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->specs }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>