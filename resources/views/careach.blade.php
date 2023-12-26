<tr>
          <td>{{$car['title']}}</td>
          <td>{{$car['description']}}</td>
          <td>{{$car['image']}}</td>
          <td>{{$car->published ? 'Yes' : 'No'}}</td>
          <td><a href="editCar/{{ $car->id }}">Edit</a></td>
          <td><a href="showCar/{{ $car->id }}">Show</a></td>
          <td><a href="deleteCar/{{ $car->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
          </td>
        </tr>