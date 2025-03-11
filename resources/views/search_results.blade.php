<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <ul>
        @foreach($results as $result)
            <li>{{ $result->field1 }} - {{ $result->field2 }}</li>
        @endforeach
    </ul>

    {{ $results->links() }}
</body>
</html>
