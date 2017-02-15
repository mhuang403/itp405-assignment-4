<!DOCTYPE html>

<html>

<head>
    <title>Tweet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tweet</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tweets as $tweet)
            <tr>
                <td>{{ $tweet->id }}</td>
                <td>{{ $tweet->tweet }}

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>

</html>