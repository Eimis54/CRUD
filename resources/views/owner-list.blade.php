<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Owner List</h2>
                <nav class="navbar navbar-light bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                <a class="navbar-brand text-primary
                " href="/car-list">To Car List</a><br>
                        </li>
                </ul>
                </nav>
                <div style="margin-right:10px;float: right;"> 
                    <a href="{{url('add-owner')}}" class="btn btn-primary">Add Owner</a>
                </div>
                <form method="post" action="{{route("owner.search")}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{$filter->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Surname</label>
                        <input class="form-control" name="surname" value="{{$filter->surname}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Years</label>
                        <select class="form-select" name="years">
                            <option {{($filter->years)?'':'selected'}} disabled>Select Years</option>
                        @foreach ($owners as $owner )
                            <option value="{{$owner->years}}"{{($filter->years==$owner->years)?'selected':''}}>{{$owner->years}}</option>
                        @endforeach
                        </select>
                        </div>
                <button class="btn btn-info">Search</button>
                </form>
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
                </div>
        @endif
                <table class="table">
                    <thead><tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Surname</th> 
                    <th>Years</th>
                    <th>Action</th>
                    </tr></thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $ownerD )
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$ownerD->name}}</td>
                                <td>{{$ownerD->surname}}</td>
                                <td>{{$ownerD->years}}</td>
                                <td><a href="{{url('edit-owner/'.$ownerD->id)}}" class="btn btn-primary">Edit</a>|<a href="{{url('delete-owner/'.$ownerD->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>