<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php

if(isset($_POST['submit']))
{

$session_id=$_SESSION['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$user=$_POST['username'];

//$sem=$_POST['sem'];

mysqli_query($conn,"update teacher set firstname = '$firstname' , lastname = '$lastname',username='$user' where teacher_id = '$session_id' ")or die(mysqli_error());	
// $sql="update teacher set firstname=:name,lastname=:lname,username=:user,about=:about where teacher_id=:session_id";
// $query = $conn->prepare($sql);
// $query->bindParam(':name',$name,PDO::PARAM_STR);
// $query->bindParam(':lname',$lname,PDO::PARAM_STR);
// $query->bindParam(':user',$user,PDO::PARAM_STR);
// //$query->bindParam(':pincode',$pincode,PDO::PARAM_STR);
// $query->bindParam(':about',$about,PDO::PARAM_STR);
// $query->execute();
   echo '<script>alert("Profile has been updated")</script>';

}
else{
    echo " ";
}



?>

    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('teacher_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <ul class="breadcrumb">
						<?php
						$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#">Teachers</a><span class="divider">/</span></li>
							<li><a href="#"><b>Profile</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<div class="alert alert-info"><i class="icon-info-sign"></i> About Me</div>
								<?php $query= mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>
                        <form action="#" method="post">
   <label>Fisrt Name</label>
<input type="text" class="form-control"  name="firstname" placeholder="First Name" value="<?php  echo $row['firstname']; ?>"/>
<label>Last Name</label>
<input type="text" class="form-control" id="email" name="lastname" placeholder="Last Name" value="<?php echo $row['lastname'];?>"/>


<label>User Name</label>
<input type="text" class="form-control" id="email" name="username" placeholder="User Name" value="<?php  echo $row['username'];?> "/>


           <label>Teacher ID No.</label>
           <input type="text" class="form-control"  name="tech" placeholder="ID" value="<?php  echo $row['teacher_id'];?>" readonly />
             
<label for="Pincode">Department  ID </label>
<input type="text" class="form-control" id="pincode" name="dept" readonly value="<?php  echo $row['department_id'];?>" />

<label for="Pincode">Email ID </label>
<input type="text" class="form-control" id="email" name="dept" readonly value="<?php  echo $row['email'];?>" />



<span id="course-availability-status1" style="font-size:12px;">
<br>
<?php // }}
?>

<button type="submit" name="submit" class="btn" >Update</button>
  </div>
</form>
   </div>
   </div>
</div>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				<?php include('teacher_right_sidebar.php') ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>