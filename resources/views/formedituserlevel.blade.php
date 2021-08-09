<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- Styles -->
    </head>
    
    <body >
        <h1>Update User Level</h1>
      
        <div class="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4 mx-auto my-auto ">
            <form action="/api/editlevel/{{$data['id']}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('post') }}
                <input type="hidden" name="id" value="{{$data['id']}}">
                <div class="form-group">
                    {{-- <label>id</label> --}}
                <input type="hidden" name="id" class="form-control" value="{{$data['id']}}" >
                </div>
                <div class="form-group">
                    {{-- <label>Name</label> --}}
                <input type="hidden" name="name" class="form-control" value="{{$data['name']}}" >
                </div>
                <div class="form-group">
                    {{-- <label>Email</label> --}}
                <input type="hidden" name="email" class="form-control" value="{{$data['email']}}" >
                </div>
                <div class="form-group">
                    <label>level</label>
                <input type="number" name="level" class="form-control" max="{{$data['level'] + 1}}" value="{{$data['level']}}">
                @if($errors->any('level'))
		                <span class="text-danger">{{$errors->first('level')}}</span>
		            @endif
                </div>
                <div class="form-group">
                   
                    <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
                </form>
            </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
