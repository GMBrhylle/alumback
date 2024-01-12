<?php
session_start();

include('../admin/includes/dbconnection.php');

if (isset($_POST['signup'])) {

   $fname = $_POST['fullname'];
   $collegeid = $_POST['collegeid'];
   $gender = $_POST['gender'];
   $batch = $_POST['batch'];
   $coursegrad = $_POST['coursegrad'];
   $currentlyconnectedto = $_POST['currentlyconnectedto'];
   $emailid = $_POST['emailid'];

   $password = md5($_POST['password']);
   $pic = $_FILES["pic"]["name"];
   $extension = substr($pic, strlen($pic) - 4, strlen($pic));
   $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
   if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Pic has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
   } else {

      $picnew = md5($pic) . time() . $extension;
      move_uploaded_file($_FILES["pic"]["tmp_name"], "images/" . $picnew);
      $ret = "select Emailid,CollegeID from tblalumni where Emailid=:emailid || CollegeID=:collegeid";
      $query = $dbh->prepare($ret);
      $query->bindParam(':emailid', $emailid, PDO::PARAM_STR);
      $query->bindParam(':collegeid', $collegeid, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      if ($query->rowCount() == 0) {


         $sql = "INSERT INTO tblalumni(FullName,CollegeID,Gender,Batch,CourseGraduated,CurrentlyConnected,Image,Emailid,Password) VALUES(:fname,:collegeid,:gender,:batch,:coursegrad,:currentlyconnectedto,:picnew,:emailid,:password)";
         $query = $dbh->prepare($sql);

         $query->bindParam(':fname', $fname, PDO::PARAM_STR);
         $query->bindParam(':collegeid', $collegeid, PDO::PARAM_STR);
         $query->bindParam(':gender', $gender, PDO::PARAM_STR);
         $query->bindParam(':batch', $batch, PDO::PARAM_STR);
         $query->bindParam(':currentlyconnectedto', $currentlyconnectedto, PDO::PARAM_STR);
         $query->bindParam(':coursegrad', $coursegrad, PDO::PARAM_STR);
         $query->bindParam(':picnew', $picnew, PDO::PARAM_STR);
         $query->bindParam(':emailid', $emailid, PDO::PARAM_STR);
         $query->bindParam(':password', $password, PDO::PARAM_STR);


         $query->execute();

         $lastInsertId = $dbh->lastInsertId();
         if ($lastInsertId) {
            echo "<script>alert('Success : Alumni signup successfull. Now you can signin');</script>";
            echo "<script>window.location.href='login.php'</script>";
         } else {
            echo "<script>alert('Error : Something went wrong. Please try again');</script>";
         }
      } else {

         echo "<script>alert('Email-id already exist. Please try again');</script>";
      }
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

   <title>PLP Alumni Registration Page</title>

   <link rel="stylesheet" href="../admin/css/bootstrap.min.css" />
   <link rel="stylesheet" href="../admin/style.css" />
</head>

<body class="inner_page login">
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <div class="logo_login">
                  <div class="center">
                     <h3 style="color:white; margin-top:250px;">PLP Alumni </h3>
                  </div>
               </div>
               <h3 style="color:green; font-weight:bold; padding-top:20px; text-align:center;">Registration Page</h3>
               <div class="login_form">
                  <form method="post" name="login" enctype="multipart/form-data">
                     <fieldset>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Fullname</label>
                           <input type="text" class="form-control" placeholder="enter your fullname" required="true" name="fullname">
                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">College ID</label>
                           <input type="text" class="form-control" placeholder="enter your college id number" required="true" name="collegeid">
                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Gender</label>
                           <select class="form-control" required="true" name="gender">
                              <option value="">Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>

                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Batch</label>
                           <input type="text" class="form-control" placeholder="enter your Batch" required="true" name="batch">
                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Graduated</label>
                           <select class="form-control" required="true" name="coursegrad">
                              <option value="">Select Course</option>
                              <?php

                              $sql2 = "SELECT * from   tblcourse";
                              $query2 = $dbh->prepare($sql2);
                              $query2->execute();
                              $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                              foreach ($result2 as $row2) {
                              ?>

                                 <option value="<?php echo htmlentities($row2->ID); ?>"><?php echo htmlentities(
                                                                                             $row2->CourseName
                                                                                          ); ?></option>
                              <?php } ?>
                           </select>

                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Currently Conncted To</label>
                           <input type="text" class="form-control" placeholder="enter your companyname" required="true" name="currentlyconnectedto">
                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Pic</label>
                           <input type="file" class="form-control" required="true" name="pic">
                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Email</label>
                           <input type="text" class="form-control" placeholder="enter your emailid" required="true" name="emailid">
                        </div>
                        <div>
                           <label style="color:#008000;font-weight: bold;padding-top: 10px;">Password</label>
                           <input type="password" class="form-control" placeholder="enter your password" name="password" required="true">
                        </div>
                        <hr>
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt" name="signup" type="submit">Register</button>
                        </div>
                     </fieldset>
                     <a class="forgot" href="login.php">Signin</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>

</html>