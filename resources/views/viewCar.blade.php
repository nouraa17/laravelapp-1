<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Car</title>
</head>

<body>
    <h1>{{$car['title']}}</h1>
    <h3>
        <p>{{$car['description']}}</p>
    </h3>
    <h3>{{$car['published'] ? "Published": "Not Published"}}</h3>
    <h3>{{$car['created_at']}}</h3>
    <h3>{{$car['updated_at']}}</h3>

</body>

</html>