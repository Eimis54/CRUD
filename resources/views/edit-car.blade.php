<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
    <h2>Edit Car</h2>    
    @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
            </div>
    @endif
    <form method="post" action="{{url('update-car')}}">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="md-3">
                <label class="form-label">Car</label>
                <input type="text" class="form-control" name="reg_number" placeholder="Enter Reg Number" value="{{$data->reg_number}}">
                @error('reg_number')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div>
            <div class="md-3">
                <label class="form-label">Brand</label>
                <input type="text" class="form-control" name="brand" placeholder="Enter Brand" value="{{$data->brand}}">
                @error('brand')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div>
            <div class="md-3">
                <label class="form-label">Model</label>
                <input type="text" class="form-control" name="model" placeholder="Enter Model" value="{{$data->model}}">
                @error('model')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div><br>
            <select name="owner_id" id="owner_id">
                @foreach ($owners as $owner)
                    <option value="{{$owner->id}}">
                        {{$owner->name}}
                    </option>
                @endforeach
            </select><br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{url('car-list')}}" class="btn btn-danger">Back</a>
    </form>
            </div>
        </div>
    </div>
</body>
</html>