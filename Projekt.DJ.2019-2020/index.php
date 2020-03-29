<?php
session_start();
if(isset($_SESSION['iflogin']) && $_SESSION['iflogin']==true)
{
  header('Location: panel_usera\index_user.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description"content="Free English Learning">
    <meta name="author" content="Daniel Jankowski">
    <meta name="keywords" content="english,polish,IT,learn,words">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./dj-css/style-index.css">
    <title>MyIt</title>
  </head>
  <body>
      <?php
      include_once("header.php"); //odwolanie do naglowka
       ?>
       <div class="container">
         <div class="card border-0 shadow my-5">
           <div class="card-body p-5">
             <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 index-main" src="./images/tlumacz1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 index-main" src="./images/tlumacz.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 index-main" src="./images/tlumacz3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="lead">
<button type="button" class="btn btn-outline-danger button-size"><a href="rejestracja.php" id="registered">Zarejestruj się</a></button>
<button type="button" class="btn btn-outline-info button-size"><a href="logowanie.php" id="logined">Zaloguj się</a></button>
</div>
<div class="lead pictures-describe">
  <hr width="75%">
  <div class="row">
  <div class="col-md-4"><img src="./images/describe.png" alt="picture1" id="describe"></div>
  <div class="col-md-8">
  <p>Zapomnij o nieefektywnym uczeniu się słówek! Odkrywaj nowe metody nauczania i wybierz swój indywidualny styl najlepszy dla ciebie!</p>

  </div>
  <hr width="75%">
</div>
<!--w tym miejscu robic dalej describy -->
<div class="row">
  <div class="col-md-4"><img src="./images/describe1.png" alt="picture1" id="describe"></div>
  <div class="col-md-8">
  <p>Zapisuj swój progres nauki i powracaj do słówek, kiedy tylko chcesz! To takie proste!</p>
  </div>
  <hr width="75%">
</div>
<div class="row">
<div class="col-md-4"><img src="./images/describe2.png" alt="picture1" id="describe"></div>
<div class="col-md-8">
<p>Ucz się w dowolnym momencie z dowolnego miejsca na świecie! Wystarczy tylko dostęp do internetu!</p>

</div>
<hr width="75%">

</div>

</div>
             <?php
             include_once("footer.php"); //odwolanie do naglowka
              ?>
           </div>
         </div>
       </div>
<!-- TUTAJ ZACZYNA SIE STOPKA -->
