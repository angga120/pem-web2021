<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: tugas akhir.html");
    }
    else{
      echo
      "<script> alert('Password salah'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User belum registrasi'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Registration...</a>
  </body>
  <style>
    html{
      background-image: url("https://cdn.pixabay.com/photo/2020/09/21/23/31/windmill-5591464_1280.jpg");
    }
    body{
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      padding: 20px 25px;
      width: 300px;
      background-color: rgba(255, 255, 255,.20);
    }

    h2{
      text-align: left;
      color: #838383;
      margin-bottom: 30px;
      text-transform: uppercase;
      border-bottom: 4px solid #50ff76;
    }

    label{
      text-align: left;
      color: #838383;
    }

    input{
      width: calc(100% - 20px);
      padding: 8px 10px;
      margin-bottom: 15px;
      border: none;
      background-color: transparent;
      border-bottom: 2px solid #50ff76;
      color: #838383;
      font-size: 20px;
    }

    button{
      width: 100%;
      padding: 5px 0;
      border: none;
      background-color:#50ff76;
      font-size: 18px;
      color: #fafafa;
    }

    a{
      color: #fafafa;
      text-decoration: none;
      background-color:#7dc0ff;
      padding: 5px 15%;
      font-size: 18px
    }
  </style>
</html>