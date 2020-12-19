<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<a href="{{route('home.index')}}">Back</a> |
	<a href="/logout">logout</a>
	<br>
	
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Create Item</legend>
			<table>
				<tr>
					<td>Product name</td>
					<td><input type="text" name="pname" value="{{old('pname')}}"></td>
				</tr>
				<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice" value="{{old('pprice')}}"></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type="text" name="quantity" value="{{old('quantity')}}"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Create"></td>
				</tr>
			</table>
			</fieldset>
		</form>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
</body>
</html>