<!DOCTYPE html>
<html>
<head>
	<title>User list page</title>
</head>
<body>

	<h3>All Products</h3>
	<a href="{{route('home.index')}}">Back</a> |
	<a href="/logout">logout</a>

	<br>
	<br>

	<table border="1">
		<tr>
			<td>Product name</td>
			<td>Product Price</td>
			<td>Quantity</td>
			<td>Action</td>
		</tr>

		@for($i=0; $i < count($product); $i++)
		<tr>
			<td>{{$product[$i]['pname']}}</td>
			<td>{{$product[$i]['pprice']}}</td>
			<td>{{$$product[$i]['quantity']}}</td>
			<td></td>
				<a href="{{route('home.edit', $$product[$i]['pid'])}}">Edit</a> |
				<a href="/delete/{{$$product[$i]['pid']}}">Delete</a> 
			</td>
		</tr>
		@endfor
	</table>

</body>
</html>