<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{__('messages.title')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  @include('includes.nav')

  <div class="container">
    <h2>{{__('messages.newCarData')}}</h2>
    <form action="{{route('storeCar')}}" method="post" enctype="multipart/form-data">
      @csrf
      <!-- @method('put') -->
      <div class="form-group">
        <label for="title">{{__('messages.formTitle')}}</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
          value="{{old('title')}}">
      </div>
      @error('title')
      <div style="color: red;">
        {{ $message }} <!-- reserved word -->
      </div>
      @enderror

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="" cols="60" rows="3">{{old('description')}}</textarea>
      </div>
      @error('description')
      <div style="color: red;">
        {{ $message }}
      </div>
      @enderror
      <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" name="image" id="image"></input>
      </div>
      @error('image')
      <div style="color: red;">
        {{ $message }}
      </div>
      @enderror

      <div class="form-group">
        <label for="category">Category:</label>
        <select name="category_id" id="category_id">
          <option value="">Select Category</option>
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->cat_name}}</option>
          @endforeach
        </select>
        @error('category_id')
        {{ $message }}
        @enderror
      </div>

      <div class="checkbox">
        <label><input type="checkbox" name="published"> Published me</label>
      </div>

      <button type="submit" class="btn btn-default">Insert</button>
    </form>
  </div>

</body>

</html>