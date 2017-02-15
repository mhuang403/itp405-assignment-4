<!DOCTYPE html>

<html>

<head>
    <title>Twitter Feed</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    @if (session('successStatus'))
        <div class="alert alert-success" role="alert">
            {{ session('successStatus') }}
        </div>
    @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="/" method="post">
        {{csrf_field() }}
        <div class="form-group"></div>
        <label for="tweet"></label>
        <textarea class="form-control" name="tweet" id="tweet" rows="2" placeholder="Type your tweet here"></textarea>
    <button type="submit" class="btn btn-primary">Post</button>
    </form>
<br>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tweet</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($tweet as $tw)
        <tr>
            <td>{{ $tw->id }}</td>
            <td>{{ $tw->tweet }}
            <br><a href="/tweets/{{ $tw->id }}">View</a></td>
            <td>
                <a href="/tweets/{{ $tw->id }}/delete" class="btn">X</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

</body>

</html>