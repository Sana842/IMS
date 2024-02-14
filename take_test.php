<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php $class_quiz_id = $_GET['class_quiz_id']; ?>
<?php $quiz_id = $_GET['quiz_id']; ?>


<?php $query1 = mysqli_query($conn,"select * from student_class_quiz where student_id = '$session_id' and class_quiz_id = '$class_quiz_id' ")or die(mysqli_error());
	  $count = mysqli_num_rows($query1);
?>

<?php
if ($count > 0){
}else{
 mysqli_query($conn,"insert into student_class_quiz (class_quiz_id,student_id) values('$class_quiz_id','$session_id')");
}
 ?>


    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_quiz_link.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
										<?php $class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										$class_id = $class_row['class_id'];
										$school_year = $class_row['school_year'];
										?>
					     <ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"> Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Practice Quiz</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">

							



							<?php
if($_GET['test'] == 'ok'){
/* $sqlp = mysqli_query($conn,"SELECT * FROM groupcode WHERE course_code = '".$row['course_code']."'"); */
$sqlp = mysqli_query($conn,"SELECT * FROM class_quiz WHERE class_quiz_id = '$class_quiz_id'")or die(mysqli_error());
$rowp = mysqli_fetch_array($sqlp);
// mysqli_query($conn,"UPDATE students SET `time-left` = ".$rowp['time']." WHERE stud_id = '".$_SESSION['user_id']."'"); 
 //echo $rowp['time']; 
$x=0;
?>
										<script>
									//	jQuery(document).ready(function(){
									//		var timer = 1;
									//		jQuery(".questions-table input").hide();
									//	setInterval(function(){
									//		var timer = jQuery("#timer").text();
									//		jQuery("#timer").load("timer.ajax.php");	
									//		if(timer == 0){
									//			jQuery(".questions-table input").hide();
									//			jQuery("#submit-test").show();
									//			jQuery("#msg").text("Time's up!!!\nPlease Submit your Answers");
									//		} else {
									//			jQuery(".questions-table input").show();
									//		}
									//	},990);	
									//	});
										</script>
<form action="take_test.php<?php echo '?id='.$get_id; ?>&<?php echo 'class_quiz_id='.$class_quiz_id; ?>&<?php echo 'test=done' ?>&<?php echo 'quiz_id='.$quiz_id; ?>" name="testform" method="POST" id="test-form">
<?php
										





										$sqla = mysqli_query($conn,"select * FROM class_quiz 
										LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
										where teacher_class_id = '$get_id' 
										order by date_added DESC ")or die(mysqli_error());
										/* $row = mysqli_fetch_array($sqla); */
										$rowa = mysqli_fetch_array($sqla);
					
										/* $rowa   = $row['quiz_id']; */
/* $sqla = mysqli_query($conn,"SELECT * FROM class_quiz WHERE course_code = '".$row['course_code']."'"); */

?>
										<h3>Test Title: <b><?php echo $rowa['quiz_title'];?></b></h3>
										<p><b>Description:<?php echo $rowa['quiz_description'];?></b></p>
										<?php
										

											$data = $rowa['url'];
											$final = str_replace('watchtv', 'embed/', $data);
											echo "
											
										<iframe src='$data'
											width='640'
											 height='832'
											 frameborder='0' 
										marginheight='0'
	 								marginwidth='0'>
											 </iframe>
												
											";
										
							
										?></b></p>
										<hr>

<tr>
<td></td>

                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
							
	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php } include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>