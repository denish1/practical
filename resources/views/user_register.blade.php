<!DOCTYPE html>

<html>

<head>

    <title>User registration</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>



<div class="container">

    <h3>User registration</h3>

    @if ($message = Session::get('success'))

          <div class="alert alert-success">

              <p>{{ $message }}</p>

          </div>

    @endif



    <form action="{{ url('register') }}" method="POST" id="signupForm">

      {{ csrf_field() }}



        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

            <label class="control-label">Name:</label>

            <input type="text" name="name" class="form-control">

            @if ($errors->has('name'))

                <span class="text-danger">{{ $errors->first('name') }}</span>

            @endif

        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

            <label class="control-label">Email:</label>

            <input type="email" name="email" class="form-control">

            @if ($errors->has('email'))

                <span class="text-danger">{{ $errors->first('email') }}</span>

            @endif

        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

            <label class="control-label">Password:</label>

            <input type="password" name="password" class="form-control">

            @if ($errors->has('password'))

                <span class="text-danger">{{ $errors->first('password') }}</span>

            @endif

        </div>

        <div class="form-group">

            <button class="btn btn-success" type="submit">Submit</button>

        </div>

    </form>
    <a href="login">Already Register click here</a>
</div>



</body>

</html>