<?php
session_start();
if(!isset($_SESSION['iflogin'])){
  header('Location: .\index.php');
  exit();

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Free English Learning">
    <meta name="author" content="Daniel Jankowski">
    <meta name="keywords" content="english,polish,IT,learn,words">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../dj-css/style.css">
    <title>MyIt</title>
  </head>
  <body>
    <div class="container-fluid">
      <?php
      include_once("header_user.php"); //odwolanie do naglowka
       ?>


    <div class="row no-gutters second_row">
      <div class="col-lg-4 col-md-4 col-sm-6">
<!-- drugie menu -->
<div class="box usermenu">
<div class="headmenu1 toogle-menu">
<h2 class="content_header"><?php echo strtoupper($_SESSION['user']); ?></h2>
</div>
 <nav class="navbar navbar-static-top menu1">
  <ul class="navbar-nav mainmenu">
    <li class="nav-item">
      <a class="nav-link user_menu" href="profile_user.php">Profil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link user_menu" href="#">Nauczone słówka</a>
    </li>
    <li class="nav-item">
      <a class="nav-link user_menu" href="kursy.php">Ukończone kursy</a>
    </li>
  </ul>
</nav>
</div>
<!-- menu kategorii -->
<?php // IDEA: DRUGIE MENU ?>
<div class="box usermenu">
<div class="headmenu toogle-menu">
<h2 class="content_header">KATEGORIE</h2>
</div>
 <nav class="navbar navbar-static-top menu">
  <ul class="navbar-nav mainmenu">
    <li class="nav-item">
      <a class="nav-link" href="course.php?id=1">Kwalifikacja E-12</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="course.php?id=2">Kwalifikacja E-13</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="course.php?id=3">Kwalifikacja E-14</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="course.php?id=4">Zwierzęta</a>
    </li>
  </ul>
</nav>
</div>


      </div>
      <div class="col-lg-8 col-md-8 col-sm-6">
        <div class="box usercontent">
          <div class="headcontent toogle-menu">
          <h2 class="content_header"></h2>
        </div>
        <div class="matter">
          <div class="alert alert-warning" role="alert">
            Wybierz z listy interesujący Cię kurs i rozpocznij naukę słówek!
          </div>
      </div>

    </div>
  </div>
  <div class="web_clear">
  </div>
</div>
<!-- TUTAJ ZACZYNA SIE STOPKA -->

<?php
include_once("footer_user.php"); //odwolanie do naglowka
 ?>
