<!DOCTYPE html>
<html lang="en">

<head>
  <title>CarsWebSite</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  @include('includes.nav')

  @if(session('success'))
  <script>
    alert("{{ session('success') }}");
  </script>
  @endif
  <div class="container">
    <h2>Cars Rows</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Category</th>
          <th>Published</th>
          <th>Edit</th>
          <th>Show</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cars as $car)
        <tr>
          <td>{{$car['title']}}</td>
          <td>{{$car['description']}}</td>
          <!-- <td>{{$car['image']}}</td> -->
          <td><img src="{{ asset('assets/images/'.$car->image)}}" width=100px alt="car"></td>
          <td>{{$car->category ? $car->category->cat_name : 'N/A'}}</td>

          <td>{{$car->published ? 'Yes' : 'No'}}</td>
          <td><a href="editCar/{{ $car->id }}">Edit</a></td>
          <td><a href="showCar/{{ $car->id }}">Show</a></td>
          <td><a href="deleteCar/{{ $car->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

</body>

</html>