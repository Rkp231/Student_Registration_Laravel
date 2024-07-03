
<html>
    <head>
        <title>CUSTOMER REGISTRATION</title>
       
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
		</head>
    <body>
	<script>
	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</script>
	<br><br>	
        <fieldset>
            <legend>Student Information</legend>
       <form action="validate" method="post">
	   @csrf
            NAME      : <input type="text" name="name" placeholder="Enter Name" required />
			@if ($errors->has('name'))
			<div>{{$errors->first('name')}}</div>
			@endif
			<br><br>
			
			
			PASSWORD  : <input type="password" name="password" placeholder="Enter password" required/>
	     <p>Password should atleast 4-30  character in length, one uppercase and one lowercase</p>
			@error('password')
			<div>{{$message}}</div>
			@enderror
			<br>
			CONFIRM PASSWORD  : <input type="password" name="cpassword" placeholder="Confirm password" required/>
			@error('cpassword')
			<div>{{$message}}</div>
			@enderror
			<br><br>
            
			GENDER             : <input type="radio" name="gender" value="Male" required/>Male
                                 <input type="radio" name="gender" value="Female" required/>Female
			@error('gender')
			<div>{{$message}}</div>
			@enderror
			<br><br>
            
			ADDRESS            : <textarea name="address" rows="4" cols="20" required></textarea>
			@error('address')
			<div>{{$message}}</div>
			@enderror
			<br><br>
            
			STATE : <select name="state" required>
                    <option selected="" disabled="">Select State</option>
                    <option value="Delhi">DELHI</option>
                    <option value="Maharashtra">MAHARASHTRA</option>
                    <option value="Gujarat">GUJRAT</option>
                    <option value="UP">UTTAR PRADESH</option>
                    <option value="UP"> BANGLORE</option>
                    <option value="UP">CHANDIGAARH</option>
                </select>
			@error('state')
			<div>{{$message}}</div>
			@enderror
				<br><br>
            
			
			CONTACT NUMBER     : <input type="number" name="mobile" placeholder="Enter contact number" required />
			@error('mobile')
			<div>{{$message}}</div>
			@enderror<br><br>
            
			EMAIL ID : <input type="text" name="email" placeholder="Enter Email" required />
			@error('email')
			<div>{{$message}}</div>
			@enderror
			<br><br>
			
			<input type="submit" value="SAVE DETAILS" />
                    <input type="reset" value="CLEAR" />
            </form>
			<a href="{{'showall'}}"><button type="button">SHOW ALL DATA</button></a>
            
            
            </fieldset>
    </body>
</html>