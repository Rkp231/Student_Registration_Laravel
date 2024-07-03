
<html>
    <head>
        <title>CUSTOMER REGISTRATION</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
    <body>
		@if($message=Session::get('success'))
		<div class="alert alert-success">
            <p>{{ $message }}</p>
		</div>
		@endif
		
		
        <fieldset>
            <legend>Student Information</legend>
			@foreach ($data as $s)
			<form action="{{route('out')}}" method="post">
				@csrf
				
				
				
				NAME      : <input type="text" name="name" value="{{$s->name}}" required />
				@if ($errors->has('name'))
				<div>{{$errors->first('name')}}</div>
				@endif
				<br><br>
				
				
				PASSWORD  : <input type="password" name="password" value="{{$s->password}}" required/>
				<p>Password should atleast 4-30  character in length, one uppercase and one lowercase</p>
				@error('password')
				<div>{{$message}}</div>
				@enderror
				<br>
				CONFIRM PASSWORD  : <input type="password" name="cpassword" value="{{$s->cpassword}}" required/>
				@error('cpassword')
				<div>{{$message}}</div>
				@enderror
				<br><br>
				
				
				ADDRESS            : <textarea name="address" rows="4" cols="20"  required>{{$s->address}}</textarea>
				@error('address')
				<div>{{$message}}</div>
				@enderror
				<br><br>
				
				STATE : <select name="state"  required>
                    <option >{{$s->state}}</option>
                    <option value="Delhi">DELHI</option>
                    <option value="Maharashtra">MAHARASHTRA</option>
                    <option value="Gujarat">GUJRAT</option>
                    <option value="UP">UTTAR PRADESH</option>
                    <option value="Banglore"> BANGLORE</option>
                    <option value="Chandigarh">CHANDIGAARH</option>
				</select>
				@error('state')
				<div>{{$message}}</div>
				@enderror
				<br><br>
				
				
				CONTACT NUMBER     : <input type="number" name="mobile" value="{{$s->mobile}}" required />
				@error('mobile')
				<div>{{$message}}</div>
				@enderror<br><br>
				
				EMAIL ID : <input type="text" name="email" value="{{$s->email}}" required />
				@error('email')
				<div>{{$message}}</div>
				@enderror
				<br><br>
				@endforeach
				
				<input type="submit" value="Log Out" />
				
			</form>
			
            
		</fieldset>
	</body>
</html>