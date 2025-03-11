<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
</head>
<body>
    <h1>Search Data</h1>
    <form action="{{ route('data.search') }}" method="GET">
        <input type="text" name="field1" placeholder="Search by Field 1">
        <input type="text" name="field2" placeholder="Filter by Field 2">
        <button type="submit">Search</button>
    </form>
</body>
</html>
