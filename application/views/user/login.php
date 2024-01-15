<br><br>

<form action="<?=base_url()?>in/login_process"method="post">

<div class="container"id="logincontainer">
	<div class="row justify-content-center">
		<div class="col-md-7">
			<div class="shadow border p-3">
				<h4> User Login</h4>
				<br>
				<span>Enter mobile/email</span>
				<input type="text" name="email_mobile"class="form-control">
				<br>
				<br>
				<span>Enter password</span>
				<input type="password" name="password"class="form-control">
				<br>
				<div class="text-center">
				<button class="btn btn-dark">Login Now</button>
				<br><br>
				 <div onclick="toggleForm()">New user,Create Account</div>
			    </div>
			    <br>
			   
			</div>
		</div>
	</div>
</div>
</form>

<form action="<?=base_url()?>in/register_user"method="post">

<div class="container"id="registercontainer"style="display: none;">
	<div class="row justify-content-center">
		<div class="col-md-7">
			<div class="shadow border p-3">
				<h4> User Registration</h4>
				<br>
				<span>Enter Name</span>
				<input type="text" name="username"class="form-control">
				<br>
				<br>
				<span>Enter Mobile</span>
				<input type="text" name="usermobile"class="form-control">
				<br>
				<span>Enter Email</span>
				<input type="text" name="useremail"class="form-control">
				<br>
				<span>Enter Password</span>
				<input type="password" name="password"class="form-control">
				<br>
				<div class="text-center">
				<button class="btn btn-dark">Register Now</button>
				<br><br>
				 <div onclick="toggleForm()">Already user,Login Now</div>
			    </div>
			    <br>
			   
			</div>
		</div>
	</div>
</div>
</form>
<br><br>

<script type="text/javascript">
	function toggleForm()
	{
		$("#logincontainer").toggle();
		$("#registercontainer").toggle();
	}
</script>