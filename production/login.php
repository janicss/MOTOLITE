<?php
  
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include_once ("db/connect.php");



  if(@$_POST['login']){
    $username = @$_POST['username'];
    $password = @$_POST['password'];

    $sql = "SELECT user_id, user_fname, user_lname, user_pwd, user_level_id, branch_id FROM user WHERE user_id='$username'";
    $query = mysqli_query($conn, $sql); 

    if($query){
      $row = mysqli_fetch_array($query, MYSQLI_NUM);
      $usr = $row[0];
      $fname = $row[1];
      $lname = $row[2];
      $pwd = $row[3];
      $lvl = $row[4];
      $brn = $row[5];
      // echo $usr;
      // echo $fname;
      // echo $lname;
      // echo $pwd;
      // echo $lvl;
      // echo $brn;  
    }

    if($username == $usr && $password == $pwd){
    $_SESSION['usr_id'] = $usr;
    $_SESSION['usr_fname'] = $fname;
    $_SESSION['usr_lname'] = $lname;
    $_SESSION['usr_lvl'] = $lvl;
    $_SESSION['usr_brn'] = $brn;

    
    header('Location: index.php');

    }




    // header('Location:index.php');

  }


?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MOTOLITE</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">



  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form role="form" action="login.php" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" name="login" class="btn btn-default" value="Log In" />
                <!-- <a class="btn btn-default submit" name="login" >Log in</a> -->
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-bolt"></i> Motolite</h1>
                  <p>©2016 All Rights Reserved. Motolite Quick-Start Battery Inventory System. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

<!--         <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Motolite</h1>
                  <p>©2016 All Rights Reserved. Motolite Quick-Start Battery Inventory System. </p>
                </div>
              </div>
            </form>
          </section>
        </div> -->
      </div>
    </div>
  </body>
</html>
