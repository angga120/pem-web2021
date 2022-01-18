<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username atau Email sudah digunakan'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registrasi berhasil'); </script>";
    }
    else{
      echo
      "<script> alert('Password tidak cocok'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" required value=""> <br>
      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login...</a>
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
      border-bottom: 4px solid #7dc0ff;
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
      border-bottom: 2px solid #7dc0ff;
      color: #838383;
      font-size: 20px;
    }

    button{
      width: 100%;
      padding: 5px 0;
      border: none;
      background-color:#7dc0ff;
      font-size: 18px;
      color: #fafafa;
    }

    a{
      color: #fafafa;
      text-decoration: none;
      background-color:#50ff76;
      padding: 5px 15%;
      font-size: 18px;
    }
  </style>
</html>