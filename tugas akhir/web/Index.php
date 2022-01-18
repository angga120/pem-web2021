<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: tugas akhir.html");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <h1>klik logout untuk keluar</h1>
    <a href="logout.php">Logout</a>
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
      width: 450px;
      background-color: rgba(163, 163, 163,.4);
    }

    h1{
      font-family:  arial;
      text-align: left;
      color: rgb(255, 255, 255);
      margin-bottom: 30px;
      text-transform: uppercase;
      border-bottom: 4px solid #50ff76;
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