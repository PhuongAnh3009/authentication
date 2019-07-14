<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="#" method="POST" role="form">
                <legend> Login</legend>
                @if($errors -> has('errorlogin'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
                        {{$errors -> first('errorlogin')}}
                    </div>
                @endif
                <div class="form-group">
                    <label for=""> Email </label>
                    <input type="text" class="form-control" id="email" placeholder="email" name="email"
                           value="{{old('email')}}">
                    @if($errors -> has('email'))
                        <p style="color:red"> {{$errors -> first('email')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for=""> Password </label>
                    <input type="password" class="form-control" id="password" placeholder="password" name="password">
                    @if($errors -> has('password'))
                        <p style="color:red"> {{$errors -> first('password')}}</p>
                    @endif
                </div>
                <div class="form group">
                    <input type="checkbox" name="remember"> Save
                </div>

                <button id="log-in" type="submit" class="btn btn-primary"> Log in</button>
            </form>
        </div>
    </div>
</div>
</body>
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('#log-in').click(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                    'url': 'login',--}}
{{--                    'data': {--}}
{{--                        'email': $('#email').val(),--}}
{{--                        'password': $('#password').val()--}}
{{--                    },--}}
{{--                    'type': 'POST',--}}
{{--                },--}}
{{--                success : function (data) {--}}
{{--                    console.log(data);                --}}
{{--            }--}}
{{--            );--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}
</html>


