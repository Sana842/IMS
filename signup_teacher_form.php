			<form id="signin_teacher" class="form-signin" method="post">
					<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Teacher</h3>
					<input type="text" class="input-block-level"  name="firstname" placeholder="Firstname" required>
					<input type="text" class="input-block-level"  name="lastname" placeholder="Lastname" required>
				
			<input type="email" class="input-block-level" id="email" name="email" placeholder="Email" required>
			
					<label>Department</label>
					<select name="department_id" class="input-block-level span12">
						<option></option>
						<?php
						$query = mysqli_query($conn,"select * from department order by department_name ")or die(mysqli_error());
						while($row = mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name']; ?></option>
						<?php
						}
						?>
					</select>
					<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
					<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
					<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
			
					<i class="icon-check icon-large"></i> <input id="submit" name="submit" class="btn btn-info" type="submit" value="Sign UP">
		
				</form>
					
		<?php
include('admin/dbcon.php');

if (isset($_POST['submit'])){
	
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email=$_POST['email'];
$department_id= $_POST['department_id'];
	
	 $query = mysqli_query($conn,"select * from teacher where username  =  '$username' ")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
	
	 if ($count > 0){ ?>
	 <script>
	 alert('Date Already Exist');
	 </script>
	 <?php
	 }else{
	 	
		mysqli_query($conn,"insert into teacher (username,password,firstname,lastname,location,department_id,email,teacher_stat)
		values ('$username','$password','$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$department_id','$email','Deactive')") or die(mysqli_error()); 
		?>
		<script>
		alert('Sucessfully Sign UP');
		</script>
	   <?php
		}}
	?>
			<script>
			// jQuery(document).ready(function(){
			// jQuery("#signin_teacher").submit(function(e){
			// 		e.preventDefault();
			// 			var password = jQuery('#password').val();
			// 			var cpassword = jQuery('#cpassword').val();
			// 		if (password == cpassword){
			// 		var formData = jQuery(this).serialize();
			// 		$.ajax({
			// 			type: "POST",
			// 			url: "teacher_signup.php",
			// 			data: formData,
			// 			success: function(html){
			// 			if(html=='true')
			// 			{
			// 			$.jGrowl("Welcome to Online  Learning Management System", { header: 'Sign up Success' });
			// 			var delay = 1000;
			// 				setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
			// 			}else{
			// 				$.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
			// 			}
			// 			}
			// 		});
			
			// 		}else
			// 			{
			// 			$.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
			// 			}
			// 	});
			// });
			</script>
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>
			
			
			
				
		
					
		