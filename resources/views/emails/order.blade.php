<html>
<head>
    <style type="text/css">
        table {
            border-collapse: collapse;
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
        tr.observe {
            background: #fbffb4;
        }
    </style>
</head>
<body>

<h2>En ny beställning har gjorts från:</h2>

<table width="50%">
    <tr>
        <td>Förnamn</td>
        <td>{{ $buyer['firstname'] }}</td>
    </tr>
    <tr>
        <td>Efternamn</td>
        <td>{{ $buyer['surname'] }}</td>
    </tr>
    <tr>
        <td>Adress</td>
        <td>{{ $buyer['adress'] }}</td>
    </tr>
    <tr>
        <td>Postnummer</td>
        <td>{{ $buyer['zipcode'] }}</td>
    </tr>
    <tr>
        <td>Ort</td>
        <td>{{ $buyer['city'] }}</td>
    </tr>
    <tr>
        <td>Telefonnummer</td>
        <td>{{ $buyer['phone'] }}</td>
    </tr>
    <tr>
        <td>E-postadress</td>
        <td>{{ $buyer['email'] }}</td>
    </tr>
    <tr>
        <td>Företagsnamn</td>
        <td>{{ $buyer['company'] }}</td>
    </tr>
    <tr>
        <td>Organisationsnummer</td>
        <td>{{ $buyer['corpid'] }}</td>
    </tr>
    <tr class="observe">
        <td>Betalningsalternativ</td>
        <td>{{ $buyer['paymentOption'] }}</td>
    </tr>
</table>

<h2>Produkter</h2>

<table width="100%">
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