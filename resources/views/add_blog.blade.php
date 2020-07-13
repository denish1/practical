@extends('layout')
@section('title')
Add Blog
@endsection
<!DOCTYPE html>
<html style="background-color: cadetblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<form method="" action="">
	@csrf
  <div class="container">
    <h1>Add Blog</h1>
    <hr>

    <label for="email"><b>Blog Name</b></label>
    <input type="text" placeholder="Enter Blog" name="blog_name" id="blog_name" style="margin-top: 10px;">

    <label for="email"><b>Category Name</b></label><br>
    @foreach($cat_tbl as $cater)
       <input type="checkbox" name="cat_name[]" value="{{$cater->id}}" id="cat_name" class="cat_name" style="margin-top: 10px;">{{$cater->category_name}}
    @endforeach
	<br>
    <button type="submit" class="add_blog" id="add_blog" style="margin-top: 20px;">Add Blog</button>
  </div>
</form>

</body>
</html>
