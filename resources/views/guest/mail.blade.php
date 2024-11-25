<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Buitenzorg Outdoor</title>

    <style>
        html,
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table,
        table tr,
        table td {
            border-collapse: collapse;
        }

        table td {
            padding: 0.5rem;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td>Pesan</td>
            <td>:</td>
            <td>{{ $msg }}</td>
        </tr>
    </table>
</body>

</html>