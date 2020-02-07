<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description"content="Free English Learning">
    <meta name="author" content="Daniel Jankowski">
    <meta name="keywords" content="english,polish,IT,learn,words">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../dj-css/style.css">
    <title><?php echo $_SESSION['user'] ?> - profil</title>
  </head>
  <body>
    <div class="container-fluid">
      <?php
      include_once("header_user.php"); //odwolanie do naglowka
       ?>
       <div class="row no-gutters second_row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="box usercontent">
             <div class="headcontent toogle-menu">
             <h2 class="content_header"><?php echo strtoupper($_SESSION['user']) ?></h2>
           </div>
           <div class="matter">
             <p class="text-center"><strong>Login: </strong><?php echo $_SESSION['user'] ?></p>
             <p class="text-center"><strong>Data utworzenia konta: </strong><?php echo $_SESSION['date'] ?></p>
             <p class="text-center"><strong>E-mail: </strong><?php echo $_SESSION['email'] ?></p>
             <p class="text-center"><button><a href="change_password.php">Zmiana hasła</a></button></p>
           </div>
           </div>
         </div>
         <div class="web_clear">
         </div>
       </div>



       <?php
       include_once("footer_user.php"); //odwolanie do naglowka
      ?>
