<html>
    <head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		@if(session('success'))
		<div class="alert alert-success">{{session('success')}}</div>
		@endif
		
		@if(session('error'))
		<div class="alert alert-danger">{{session('error')}}</div>
		@endif
		<fieldset>
            <legend>LOGIN FORM</legend>
			
			
			<br><br><br><br><br><br>
			<center>
				<form action="generate" method="POST">
					@csrf
				    Email-ID: <input type="text" name ="email" /> <br>
					(For OTP generation)<br><br>
					<input type="submit" value="Enter" />
				</form>
			</center>
		</fieldset>
	</body>
</html>
