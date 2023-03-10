<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">   
            <div class="col-md-12">
                <h2>Car List</h2>
                <div>
                    <nav class="navbar navbar-light bg-light">
                        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand text-primary" href="/owner-list">To Owner List</a>
                            </li>
                        </ul>
                    </nav>
                <div style="margin-right:10px;float: right;"> 
                    <a href="{{url('add-car')}}" class="btn btn-primary">Add Car</a>
                </div>
                <form method="post" action="{{route("car.search")}}">
                    @csrf
                    <div class="mb-3"><br>
                    Registration Number<br>
                    <select class="form-select" name="reg_number">
                        <option {{($filter->reg_number)?'':'selected'}} disabled>Registration number</option>
                        @foreach ($cars as $car)
                        <option value="{{$car->reg_number}}"{{($filter->reg_number==$car->reg_number)?'selected':''}}>{{$car->reg_number}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input class="form-control" name="brand" value="{{$filter->brand}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Model</label>
                        <input class="form-control" name="model" value="{{$filter->model}}">
                    </div>
                <button class="btn btn-info">Search</button>
                </form>
                    </div>
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
                </div>
        @endif
                <table class="table">
                    <thead><tr>
                    <th>#</th>
                    <th>Owner</th>
                    <th>Reg Number</th>
                    <th>Brand</th> 
                    <th>Model</th>   
                    <th>Action</th>
                    </tr></thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $carD )
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$carD->owner->name}}</td>
                                <td>{{$carD->reg_number}}</td>
                                <td>{{$carD->brand}}</td>
                                <td>{{$carD->model}}</td>
                                <td><a href="{{url('edit-car/'.$carD->id)}}" class="btn btn-primary">Edit</a>|<a href="{{url('delete-car/'.$carD->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>