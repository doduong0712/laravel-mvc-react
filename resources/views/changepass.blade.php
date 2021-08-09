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
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
        <!-- Styles -->
    </head>
    
    <body >
       
        <h1>Update User</h1>
        
        <div class="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4 mx-auto my-auto ">
            <form action="saveUpdatePass" id="change_password_form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('post') }}
                
                <div class="form-group">
                    <div class="form-group">
                        <label>Mật khẩu cũ</label>
                    <input type="password" name="old_password" placeholder="**********" class="form-control" value="" >
                    @if($errors->any('old_password'))
		                <span class="text-danger">{{$errors->first('old_password')}}</span>
		            @endif
                    </div>
                    <a href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới</label>
                    <input type="password" name="new_password" placeholder="**********" class="form-control" value="" >
                    @if($errors->any('new_password'))
		                <span class="text-danger">{{$errors->first('new_password')}}</span>
		            @endif
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu</label>
                    <input type="password" name="confirm_password" placeholder="**********" class="form-control" value="" >
                    @if($errors->any('confirm_password'))
		                <span class="text-danger">{{$errors->first('confirm_password')}}</span>
		            @endif
                    </div>
                    <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
                </form>
            </div>
          

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('js/profile.js')}}"></script>
    </body>
</html>
