<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">

            @if($action=='show')
                @if(Session::has('msg'))
                    <span class="alert alert-success">{{Session('msg')}}</span>
                @endif
                <a href="/create" class="btn btn-primary float-right p3 mb-3">Add Student</a>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stds as $std)
                        <tr>
                            <td>{{$std->name}}</td>
                            <td>{{$std->email}}</td>
                            <td><a href="/edit/{{$std->id}}"><i class="fa fa-edit"></i></a> |
                                <a href="/delete/{{$std->id}}"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$stds->links()}}
            @elseif($action=='create')
                <div class="card">
                    <div class="card-header">
                        Add student
                        <a href="/show" class="btn btn-primary float-right p3 mb-3">Show Students</a>
                    </div>
                    <div class="card-body">
                        <form action="/store" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @error('name')<p>{{$message}}</p>@enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                @error('email')<p>{{$message}}</p>@enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Add Student</button>
                            </div>
                        </form>
                    </div>
                </div>

            @elseif($action=='edit')
                <div class="card">
                    <div class="card-header">
                        Edit student
                        <a href="/show" class="btn btn-primary float-right p3 mb-3">Show Students</a>
                    </div>
                    <div class="card-body">
                        <form action="/update/{{$std->id}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$std->name}}">
                                @error('name')<p>{{$message}}</p>@enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$std->email}}">
                                @error('email')<p>{{$message}}</p>@enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Update Student</button>
                            </div>
                        </form>
                    </div>
                </div>

            @else
                ok
            @endif

        </div>
    </div>
</div>


<span style="position: fixed;bottom: 0;text-align: center;background: black;color: white;width: 100%" class="p-4">Laravel CRUD App 2021. Copyright all rights reserved.</span>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>