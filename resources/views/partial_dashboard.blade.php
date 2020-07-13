<table id="customers">
  <tr>
    <th>Blog Name</th>
    <th>Category Name</th>
    <th>Created Date</th>
  </tr>
  @if(count($blogs)>0)
	@foreach($blogs as $blog)
  <tr>
    <td>{{$blog->blog_name}}</td>
    <td>{{$blog->cat_name}}</td>
    <td>{{$blog->date}}</td>
  </tr>
  @endforeach
  @else
  <tr><td colspan="3">No data found</td></tr>
  @endif
</table>