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
    <link rel="stylesheet" type="text/css" href="./dj-css/style.css">
    <title>Logowanie</title>
  </head>
  <body>
    <div class="container-fluid">
      <?php
      include_once("header.php"); //odwolanie do naglowka
       ?>
       <div class="row no-gutters second_row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="form_log">
             <form class="form-group" action="login.php" method="post">
               <h2 class="form_logowanie">LOGOWANIE</h2>
               <p class="text-center"><strong>Login:</strong></p>
               <input class="input_log" type="text" name="login">
             <p class="text-center"><strong>Password:</strong></p>
               <input class="input_log" type="password" name="password">
               <button type="submit" name="button">Zatwierdź</button>
               <p class="text-center">Błędny login lub hasło</p>
               <!-- <p class="text-center"><small><a href="forgot_psw.php">Zapomniałeś hasła?</a></small></p> -->
             </form>
           </div>
         </div>
         <div class="web_clear">
         </div>
       </div>



       <?php
       include_once("footer.php"); //odwolanie do naglowka
      ?>
