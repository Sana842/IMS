<?php
include('admin/dbcon.php');
session_start();
// $username = $_POST['username'];
// $password = $_POST['password'];
// $firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
// $class_id = $_POST['class_id'];

// $query = mysqli_query($conn,"select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'")or die(mysqli_error());
// $row = mysqli_fetch_array($query);
// $id = $row['student_id'];

// $count = mysqli_num_rows($query);
// if ($count > 0){
// 	mysqli_query($conn,"update student set password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error());
// 	$_SESSION['id']=$id;
// 	echo 'true';
// }else{
// echo 'false';
// }




if (isset($_POST['login'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
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
		window.location = "add_student.php";
		</script>
		<?php
		}
		}
	






// mysqli_query($conn,"insert into student (username,firstname,lastname,location,class_id,status,email)
// values ('$username','$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered','$email')                                    
// ") or die(mysqli_error()); 


?>