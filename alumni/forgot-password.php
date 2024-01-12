<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];

$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Emailid FROM tblalumni WHERE Emailid=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);

$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblalumni set Password=:newpassword where Emailid=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);

$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id is invalid');</script>"; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
    
      <title>College Alumni System || Forgot Page</title>
     
      <link rel="stylesheet" href="../admin/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="../admin/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="../admin/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="../admin/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="../admin/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="../admin/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="../admin/css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="../admin/js/semantic.min.css" />
   <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <h3 style="color: white;">College Alumni System</h3>
                     </div>
                  </div>
                   <h3 style="color:red;font-weight: bold;padding-top: 20px;text-align: center;">Forgot Password</h3>
                  <div class="login_form">
                     <form method="post" name="chngpwd" onSubmit="return valid();">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="email" class="form-control" placeholder="Email" required="true" name="email">
                           </div>
                         
                           <div class="field">
                              <label class="label_field">New Password</label>
                             <input type="password" class="form-control" name="newpassword" placeholder="New Password" required="true">
                           </div>
                           <div class="field">
                              <label class="label_field">Repeat Password</label>
                             <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="true">
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt" name="submit" type="submit">RESET</button>
                           </div>
                        </fieldset>
                        <a class="forgot" href="login.php">Login</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../admin/js/jquery.min.js"></script>
      <script src="../admin/js/popper.min.js"></script>
      <script src="../admin/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="../admin/js/animate.js"></script>
      <!-- select country -->
      <script src="../admin/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="../admin/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="../admin/js/custom.js"></script>
   </body>
</html>