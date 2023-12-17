<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
</head>

<body>
    <h1>{{$post['postTitle']}}</h1>
    <h1>{{$post['author']}}</h1>
    <h3>
        <p>{{$post['description']}}</p>
    </h3>
    <h3>{{$post['published'] ? "Published": "Not Published"}}</h3>
    <h3>{{$post['created_at']}}</h3>
    <h3>{{$post['updated_at']}}</h3>

</body>

</html>