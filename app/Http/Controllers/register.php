<?php
	
	namespace App\Http\Controllers;
	use Carbon\Carbon;
	use DB;
	use App\student;
	use Illuminate\Http\Request;
	
	class register extends Controller
	{
		/**
			* Display a listing of the resource.
			*
			* @return \Illuminate\Http\Response
		*/
		public function index()
		{
			return view('stud_regist.login');
		}
		
		/**
			* Show the form for creating a new resource.
			*
			* @return \Illuminate\Http\Response
		*/
		public function create()
		{
			
		}
		
		/**
			* Store a newly created resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @return \Illuminate\Http\Response
		*/
		public function store(Request $req)
		{
			
			$req->validate(
			[
			"name"=>['required','regex:/^[a-zA-Z\s]+$/'],
			"password"=>['required','regex:/^(?=.*\d)(?=.*[a-zA-Z]).{4,30}$/'],
			"cpassword"=>['required','same:password'],
			"gender"=>['required'],
			"address"=>['required'],
			"state"=>['required'],
			"mobile"=>['required','numeric'],
			"email"=>['required','email']
			],
			[
			'name.regex'=>'Name must be in alphabat',
			'paswword.regex'=>'Password is incorrect',
			'cpaswword.same'=>'Password not matching',
			'gender.required'=>'Gender must be selected ',
			'address.required'=>'Address is not proper',
			'state.required'=>'State must be selected',
			'mobile.numeric'=>'Mobile must be digit',
			'email.email'=>'Email is incorrect',
			]
			);
			$n=$req->input('name');
			$p=$req->input('password');
			$cp=$req->input('cpassword');
			$g=$req->input('gender');
			$a=$req->input('address');
			$s=$req->input('state');
			$m=$req->input('mobile');
			$e=$req->input('email');
			
			$data=array('name'=>$n,'password'=>$p,'cpassword'=>$cp,'gender'=>$g,'address'=>$a,'state'=>$s,'mobile'=>$m,'email'=>$e,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s'));
			
			DB::table('students')->insert($data);
			return view('stud_regist.student_form')->with('success','student registerd succussfully');
			
			//using laravel query
			//student::create($req->all());
			//return redirect()->Route('register')->with('success','student registerd succussfully');
		}
		
		/**
			* Display the specified resource.
			*
			* @param  \App\student  $student
			* @return \Illuminate\Http\Response
		*/
		public function show()
		{
			$student = DB::select('select * from students');
			return view('stud_regist.showdata', ['student' => $student]);   
		}
		
		/**
			* Show the form for editing the specified resource.
			*
			* @param  \App\student  $student
			* @return \Illuminate\Http\Response
		*/
		public function edit($id)
		{
			$data=DB::select('select * from students where id=?',[$id]);
			return view('stud_regist.edit',compact('data'));
			
		}
		
		/**
			* Update the specified resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @param  \App\student  $student
			* @return \Illuminate\Http\Response
		*/
		public function update(Request $req, $id)
		{
			$req->validate(
			[
			"name"=>['required','regex:/^[a-zA-Z\s]+$/'],
			"password"=>['required','regex:/^(?=.*\d)(?=.*[a-zA-Z]).{4,30}$/'],
			"cpassword"=>['required','same:password'],
			
			"address"=>['required'],
			"state"=>['required'],
			"mobile"=>['required','numeric'],
			"email"=>['required','email']
			],
			[
			'name.regex'=>'Name must be in alphabat',
			'paswword.regex'=>'Password is incorrect',
			'cpaswword.same'=>'Password not matching',
			
			'address.required'=>'Address is not proper',
			'state.required'=>'State must be selected',
			'mobile.numeric'=>'Mobile must be digit',
			'email.email'=>'Email is incorrect',
			]
			);
			
			$n=$req->input('name');
			$p=$req->input('password');
			$cp=$req->input('cpassword');
			$a=$req->input('address');
			$s=$req->input('state');
			$m=$req->input('mobile');
			$e=$req->input('email');
			DB::update('update students set name = ? ,password= ?,cpassword= ?,address= ?,state= ?,mobile= ?,email=? where id = ?', [$n,$p,$cp,$a,$s,$m,$e,$id]);
			
			return redirect('showall')->with('success','updated succussfully');
			
		}
		
		
		/**
			* Remove the specified resource from storage.
			*
			* @param  \App\student  $student
			* @return \Illuminate\Http\Response
		*/
		public function destroy($id)
		{
			DB::delete('delete from students where id=?',[$id]);
			return redirect('showall')->with('success','deleted succussfully');
		}
		
		
		
		
		public function otp_send()
		{
			session_start();
			if(!empty($_POST['email']))
			{
				$em = $_POST['email'];
				$data=DB::select('select id from students where email=?',[$em]);
				$id=DB::select('select user_id from otp_verification where email=?',[$em]);
				if($data==$id)
				{
					$otp = rand(111111, 999999);
					DB::update('update otp_verification set confirm_code = ? where id = ?', [$otp,$id]);
					
					
					
					$to="rohit231kumar@gmail.com";
					$subject="otp";
					mail($to,$subject,$otp);
					
					return	view('stud_regist.matchotp',compact($id));
				}
				else
				{
					return view('stud_regist.login')->with('success','wrong Email Address');
				}
			} 
			else
			{
				return redirect('stud_regist.login')->with('success','Pls enter Email');
				
			}
			
			
			
			
		}
		
		public function otp_valid($id)
		{
			if(!empty($_POST[otp]))
			{   
		        $o=$_POST[otp];
				$ot=DB::select('select confirm_code from otp_verification where user_id=?',[$id]);
				if($o==$ot)
				{
					$data=DB::select('select * from students where id=?',[$id]);
				    return view('stud_regist.edit',compact('data'));
				}
				else
				{
					return redirect('stud_regist.matchotp')->with('success','Pls enter correct OTP');
					
				}
				
				
			}
			else
			{
			return redirect('stud_regist.matchotp')->with('success','Pls enter OTP');
			}	
			
		}
		
		public function log_out()
		
		{
			return redirect('stud_regist.login');
			}
		
	}
