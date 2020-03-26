<?php
session_start();
if(!isset($_SESSION['iflogin'])){
  header('Location: .\index.php');
  exit();
  }
if(!isset($_GET['id'])){
  header('Location: index_user.php');
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

<?php // IDEA: DRUGIE MENU ?>
<?php
$course = $_GET['id'];

 ?>
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
  </ul>
</nav>
</div>
<?php
  $topic = "";
  if($course=='1'){
    $topic = 'e12';
  }
  if($course=='2'){
    $topic = 'e13';
  }
  if($course=='3'){
    $topic = 'e14';
  }

 ?>

      </div>
      <div class="col-lg-8 col-md-8 col-sm-6">
        <div class="box usercontent">
          <div class="headcontent toogle-menu">
          <h2 class="content_header"><?php echo $topic ?></h2>
        </div>
        <div class="matter">
          <div class="alert alert-warning" role="alert">
            Wybrałeś kurs <?php echo $topic;
            if($topic=='e12'){
              echo ". Podczas kursu zapoznasz się z pojęcia dotyczącymi sprzętu komputerowego. Jeśli chcesz, <a href=\"app.php?id=1\" class=\"alert-link\">Rozpocznij kurs";
            }
            if( $topic=='e13'){
              echo ". Podczas kursu zapoznasz się z pojęciami dotyczącymi sieci komuterowych. Jeśli chcesz, <a href=\"app.php?id=2\" class=\"alert-link\">Rozpocznij kurs";
            }
            if($topic=='e14'){
              echo ". Podczas kursu zapoznasz się z pojęciami dotyczącymi programowania aplikacji i stron internetowych.   Jeśli chcesz, <a href=\"app.php?id=3\" class=\"alert-link\">Rozpocznij kurs";
            }



             ?> </a>.
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
