<!DOCTYPE html>
<html>
<head>
    <title>Customer Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Customer List Report</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Birth Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->gender }}</td>
                <td>{{ $c->address }}</td>
                <td>{{ $c->dob }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>