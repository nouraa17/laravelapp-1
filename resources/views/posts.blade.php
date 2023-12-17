<!DOCTYPE html>
<html lang="en">

<head>
    <title>Posts WebSite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('includes.navposts')
    <div class="container">
        <h2>Posts Rows</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                <th>Created at</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Published</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                <td>{{$post['created_at']}}</td>
                    <td>{{$post['postTitle']}}</td>
                    <td>{{$post['author']}}</td>
                    <td>{{$post['description']}}</td>
                    <td>{{$post->published ? 'Yes' : 'No'}}</td>
                    <td><a href="editPost/{{ $post->id }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>