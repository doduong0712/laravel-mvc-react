<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
    </head>
    
    <body>
        <div class="container ">
            <div class="row">
                <div class="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4 mx-auto my-auto ">
                <form action="authLogin" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            {{-- @if($errors->any('email'))
		                        <span class="text-danger">{{$errors->first('email')}}</span>
		                    @endif --}}
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            {{-- @if($errors->any('password'))
		                        <span class="text-danger">{{$errors->first('password')}}</span>
		                    @endif --}}
                        </div>
                        <div class="form-group">
                           
                            <input type="submit" name="submit" class="form-control btn btn-primary" value="Đăng Nhập">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
