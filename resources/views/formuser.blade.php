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
    
    <body id="app-layout">
        <nav class="navbar navbar-default mb-5">
            <div class="container">
                <div class="navbar-header">
    
                    <!-- Branding Image -->
                  
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(isset($user_login))
                                {{"Xin chào : ".$user_login->name}}
                            @endif
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href={{"edit/".$user_login->id}}>Thông tin cá nhân</a>
                              <a class="dropdown-item" href="{{"changePass"}}">Thay đổi mật khẩu</a>
                              <a class="dropdown-item" href="{{"/api/auth/logout"}}">Log out</a>
                            </div>
                        </div>     
                </div>
    
            </div>
        </nav>
        <br>
        <div class="container mt-5">
           
            <h2>Danh sách User</h2>
            <br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">level</th>
                    <th scope="col">edit level</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach($user as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->level}}</td>
                        <td>
                          <a class="btn btn-primary" href={{"editlevel/".$users->id}}>Edit Level</a>
                        </td>
                    </tr>
                    @endforeach
                 
                </tbody>
              </table>
            
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
