@extends('layout')
@section('title')
Dashboard
@endsection
<div id="reportrange" class="date_change" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 15%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
<input type="hidden" id="add_start_date">
<input type="hidden" id="add_end_date">
<span class="bottom_table_content btm_table_content_wt_pagination paginate_data">
    @include('partial_dashboard')                                
</span>
<a href="{{URL::to('add_blog')}}">POST NEW BLOG</a>
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

</body>
</html>