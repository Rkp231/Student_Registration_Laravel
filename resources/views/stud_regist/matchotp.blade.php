<html>
    <head>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<fieldset>
            <legend>LOGIN FORM</legend>
			
			
			<br><br><br><br><br><br>
			<center>
				<form action="{{route('lvalidate',$id)}}" method="POST">
					@csrf
				    OTP: <input type="text" name ="otp" /> <br>
					(Enter 6 digit OTP sent to your Email)<br><br>
					<input type="submit" value="Submit" />
				</form>
			</center>
		</fieldset>
	</body>
</html>
