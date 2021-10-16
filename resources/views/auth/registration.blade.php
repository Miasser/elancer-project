<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
                <h4>Registration</h4>
                <hr>
                <form action="{{route('register-user')}}" method="post">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('fail'))
                        <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('fail')}}</div>
                    @endif
                    @csrf

                    <div class="form-group">
                        <label for="name">Full Name
                            <input type="text" class="form-control" placeholder="Enter Full name"
                                   name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="email">Email
                            <input type="text" class="form-control" placeholder="Enter Email"
                                   name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="password">Password
                            <input type="password" class="form-control" placeholder="Enter Password"
                                   name="password" value="">
                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Register</button>

                    </div>
                    <br>
                    <a href="registration">New User !! Registration Here.</a>

                </form>
            </div>
        </div>
    </div>

</body>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</html>
