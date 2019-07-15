<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.js"--}}
{{--            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"--}}
{{--            crossorigin="anonymous"></script>--}}
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <form action="#" method="POST" role="form">
                <legend> Login</legend>
{{--                @if($errors -> has('errorlogin'))--}}
                    <div class="alert alert-danger error errorLogin" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
{{--                        {{$errors -> first('errorlogin')}}--}}
                        <p style="color: red; display:none" class="error errorLogin"></p>
                    </div>
{{--                @endif--}}
                <div class="form-group">
                    <label for=""> Email </label>
                    <input type="text" class="form-control" id="email" placeholder="email" name="email"
                           value="{{old('email')}}">
                    <p style="color: red; display:none" class="erorr errorEmail"></p>
{{--                    @if($errors -> has('email'))--}}
{{--                        <p style="color:red"> {{$errors -> first('email')}}</p>--}}
{{--                    @endif--}}
                </div>
                <div class="form-group">
                    <label for=""> Password </label>
                    <input type="password" class="form-control" id="password" placeholder="password" name="password">
                    <p style="color: red; display:none" class="erorr errorPassword"></p>
{{--                    @if($errors -> has('password'))--}}
{{--                        <p style="color:red"> {{$errors -> first('password')}}</p>--}}
{{--                    @endif--}}
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
<script>
    $(function () {
        $('#log-in').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                'url': 'login',
                'data': {
                    'email': $('#email').val(),
                    'password': $('#password').val()
                },
                'type': 'POST',
                success: function (data) {
                    console.log(data);
                    if (data.error == true) {
                        $('.error').hide();
                        if (data.message.email != undefined) {
                            $('.errorEmail').show().text(data.message.email[0]);
                        }
                        if (data.message.password != undefined) {
                            $('.errorPassword').show().text(data.message.password[0]);
                        }
                        if (data.message.errorlogin != undefined) {
                            $('.errorLogin').show().text(data.message.errorlogin[0]);
                        }
                    }
                    else {
                        window.location.href = 'http://localhost/admin/home'
                    }
                }
            });
        })
    });
</script>
</html>


