
<html>
	<head>
	</head>
	<body>
	<center>
		<table class='center' border="1">
			<tr>
			    <th>id</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Address</th>
				<th>State</th>
				<th>Mobile</th>
				<th>Email</th>
			</tr>
			@foreach ($student as $s)
			<tr>
				<td>{{$s->id}}</td>
				<td>{{$s->name}}</td>
				<td>{{$s->gender}}</td>
				<td>{{$s->address}}</td>
				<td>{{$s->state}}</td>
				<td>{{$s->mobile}}</td>
				<td>{{$s->email}}</td>
				<td><a href="{{route('edit',$s->id)}}">Edit</a></td>
				<td><a href="{{route('delete',$s->id)}}">Delete</a></td>
			</tr>
			@endforeach
		</table> 
		
		<a href="{{route('register')}}"><br><br><button type="button">BACK TO MAIN FORM</button></a><br><br>
		</center>	
		</body>
</html>