<!DOCTYPE html>
<html>
<head>
	<title>Employee Home Page</title>
</head>
<body>
	@csrf
	<h1>Welcome, </h1>
	ID: {{$id}} <br>
	Name: {{$name}}
	<br>
	<br>
	<a href="/create">Create New Product</a> |
	<a href="/productlist">View Product</a> |
	<a href="/logout">logout</a>

</body>
</html>