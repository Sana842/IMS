
			<form id="signin_student" class="form-signin" method="post">
			<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Student</h3>
				<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Firstname" required>

			<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname" required>
			
			<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
			
			<input type="email" class="input-block-level" id="email" name="email" placeholder="Email" required>
			
			<label>Class</label>
			<select name="class_id" class="input-block-level span5">
				<option></option>
				<?php
				$query = mysqli_query($conn,"select * from class order by class_name ")or die(mysqli_error());
				while($row = mysqli_fetch_array($query)){
				?>
				<option value="<?php  echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
				<?php
				}
				?>
			</select>
			<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
			<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
			<i class="icon-check icon-large"></i> <input id="submit" name="submit" class="btn btn-info" type="submit" value="Sign UP">
			</form>
			
		<?php
include('admin/dbcon.php');

if (isset($_POST['submit'])){
	
	$username = $_POST['username']; 
	//rand(100000,999999);

$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email=$_POST['email'];
$class_id = $_POST['class_id'];
	
	 $query = mysqli_query($conn,"select * from student where username  =  '$username' ")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
	
	 if ($count > 0){ ?>
	 <script>
	 alert('Date Already Exist');
	 </script>
	 <?php
	 }else{
	 	mysqli_query($conn,"insert into student (username,firstname,lastname,location,class_id,status,password,email)
values ('$username','$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered','$password','$email')") or die(mysqli_error()); 

	?>
	
		<script>
		alert('Sucessfully Sign UP');
		</script>
	  
	
	<?php
	}
	}
		?>
			<?php
 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/PHPMailer.php';
 require 'phpmailer/src/SMTP.php';
 
 if(isset($_POST["submit"]))
 {
     $mail = new PHPMailer(true);
 
     $mail->isSMTP();
     $mail->Host ='smtp.gmail.com';
     $mail->SMTPAuth =true;
     $mail->Username='khairunshaikh16847@gmail.com';
     $mail->Password ='vcthcukzjqubifjp';
     $mail->SMTPSecure='ssl';
     $mail->Port=465;
 
     $mail->setFrom('khairunshaikh16847@gmail.com');
     $mail->addAddress($_POST["email"]);
 
     $mail->isHTML(true);
		$subject=  "Username and Password ";
     $mail->Subject = $subject;
	// $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	//								$row = mysqli_fetch_array($query);
						
	$username=$_POST['username']; 
	 $password=$_POST["password"];
	  $message= "The Username ID  $username and  Password $password for learning management portal." ;
     $mail->Body = $message;
 
     $mail->send();
 
     echo
     "
     <script>
     alert('Sent Successfully');
     document.location.href='index.php'
     
     </script>
     ";
 
 
 
 
 }
 
 
 
 ?>  

			
		
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>
			
			
			
				
		
					