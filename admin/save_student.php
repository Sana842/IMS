<?php
include('dbcon.php');
        
               $un = $_POST['un'];
               $fn = $_POST['fn'];
               $ln = $_POST['ln'];
               $class_id = $_POST['class_id'];
               $email=$_POST['email'];

               mysqli_query($conn,"insert into student (username,firstname,lastname,location,class_id,status,email)
		values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered','$email')                                    
		") or die(mysqli_error()); 
        
        

        ?>
<?php    ?>
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
     $mail->Password ='pmsoqivfmyfuxgij';
     $mail->SMTPSecure='ssl';
     $mail->Port=465;
 
     $mail->setFrom('khairunshaikh16847@gmail.com');
     $mail->addAddress($_POST["email"]);
 
     $mail->isHTML(true);
 
     $mail->Subject = $_POST["subject"];
     $mail->Body = $_POST["message"];
 
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
