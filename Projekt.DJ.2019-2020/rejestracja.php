<?php
session_start();

if(isset($_POST['e-mail'])){
  //udana walidacja
  $validate = true;
  $login_s = $_POST['login'];
  $email_s = $_POST['e-mail'];
  $password_s = $_POST['password'];
  $password2_s = $_POST['password2'];
  //Login
  if((strlen($login_s))<3 || (strlen($login_s)>30)){
    $validate = false;
    $_SESSION['e_login_s']="Login musi posiadać od 3 do 30 znaków.";
  }
  if(ctype_alnum($login_s)==false){
    $validate = false;
    $_SESSION['e_login_s']="Login musi składać się tylko z liter i cyfr.";
  }
//$email_s
  $email_s1 = filter_var($email_s, FILTER_SANITIZE_EMAIL);
  if((filter_var($email_s1, FILTER_VALIDATE_EMAIL)==false) || ($email_s1!=$email_s)) {
    $validate = false;
    $_SESSION['e_email_s']="Podaj poprawny adres email.";
  }
  //sprawdzanie hasel
  if((strlen($password_s)<8) || strlen($password_s>20)) {
    $validate = false;
    $_SESSION['e_password_s']="Hasło musi posiadać od 8 do 20 znaków.";
  }
  if($password_s!=$password2_s){
    $validate = false;
    $_SESSION['e_password_s']="Podane hasła nie są takie same.";
  }
  $password_s_hash = password_hash($password_s, PASSWORD_DEFAULT);
  //sprawdzanie captcha;
  /*$siteKey="6LeDYtYUAAAAAECRKT2OebsVrM1_fPUAkKwXf9q_";
  $secret="6LeDYtYUAAAAAIxbpaAXCkSSxWRF1m85Rr7kVBla";
  $recaptcha = new \ReCaptcha\ReCaptcha($secret);
  $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
  if($resp->isSuccess()) {
    echo "najs";
  } else {
    echo "chuj";
  } */

include_once('connection.php');
mysqli_report(MYSQLI_REPORT_STRICT);
$connection = mysqli_connect($host, $root, $password_database, $database_name);
if($connection->connect_errno!=0)
{
  echo "blad polaczenia";
} else {
  mysqli_set_charset($connection, "utf8");
  //sprawdzanie czy dany email jest juz w bazie
  // $check_email = "Select Id_użytkownika from użytkownicy where email='$email_s'";
  $result = mysqli_query($connection, sprintf("Select Id_użytkownika from użytkownicy where email='%s'",
                                              mysqli_real_escape_string($connection,$email_s)
                                              ));
  if($result->num_rows>0){
    $validate=false;
    $_SESSION['e_email_s']="Podany adres email jest już zarejestrowany w bazie.";

  }
  //sprawdzanie czy dany login jest juz w bazie

//  $check_login = sprintf("Select Id_użytkownika from użytkownicy where login='$login_s'";
  $result1 = mysqli_query($connection, sprintf("Select Id_użytkownika from użytkownicy where login='%s'",
                                               mysqli_real_escape_string($connection,$login_s)
                                              ));
  if($result1->num_rows>0){
    $validate=false;
    $_SESSION['e_login_s']="Podany login jest już zajęty.";


  }
  mysqli_close($connection);
}

  if($validate==true){
    $connection = mysqli_connect($host, $root, $password_database, $database_name);
          if($connection->connect_errno!=0)
            {
              header('Location: index.php');
            }else {
                  mysqli_set_charset($connection, "utf8");
                      if($connection->query(sprintf("INSERT INTO użytkownicy VALUES (NULL, '%s', '%s', NOW(), 2, '%s')",
                      mysqli_real_escape_string($connection, $login_s),
                      mysqli_real_escape_string($connection, $password_s_hash),
                      mysqli_real_escape_string($connection, $email_s)
                      )))
                      {
                        $_SESSION['registered']=true;
                        header('Location: registered.php');
                        mysqli_close($connection);
                      } else {
                        header('Location: index.php');
                        mysqli_close($connection);
                      }
                }
  }
//if wyslania zmiennych //
}
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Rejestracja</title>
  </head>
  <body>
    <div class="container-fluid">
      <?php
      include_once("header.php");
       ?>
       <div class="row no-gutters second_row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="form_log">
             <form class="form-group" method="post">
               <h2 class="form_logowanie">REJESTRACJA</h2>
               <p class="text-center">Login: </p>
               <input class="rej" type="text" name="login">
               <?php
               if(isset($_SESSION['e_login_s'])){
                 echo '<p class="text-center"><strong>'.$_SESSION['e_login_s'].'</strong></p>';
                 unset($_SESSION['e_login_s']);
               }
                ?>
               <p class="text-center">E-mail:</p>
               <input class="rej" type="email" name="e-mail">
               <?php
               if(isset($_SESSION['e_email_s'])){
                 echo '<p class="text-center"><strong>'.$_SESSION['e_email_s'].'</strong></p>';
                 unset($_SESSION['e_email_s']);
               }
                ?>
               <p class="text-center">Hasło:</p>
               <input class="rej" type="password" name="password">
               <?php
               if(isset($_SESSION['e_password_s'])){
                 echo '<p class="text-center"><strong>'.$_SESSION['e_password_s'].'</strong></p>';
                 unset($_SESSION['e_password_s']);
               }
                ?>
               <p class="text-center">Powtórz Hasło:</p>
               <input class="rej" type="password" name="password2">
               <!-- <div class="g-recaptcha" data-sitekey="6LeDYtYUAAAAAECRKT2OebsVrM1_fPUAkKwXf9q_"></div>
               <?php
               /* if(isset($_SESSION['e_captcha_s'])){
                 echo '<p class="text-center">'.$_SESSION['e_captcha_s'].'</p>';
                 unset($_SESSION['e_captcha_s']);
               }
                */ ?>
              -->
               <button type="submit" name="button">Zatwierdź</button>
             </form>
           </div>
         </div>
         <div class="web_clear">
         </div>
       </div>
       <?php
       include_once("footer.php"); //odwolanie do naglowka
      ?>
