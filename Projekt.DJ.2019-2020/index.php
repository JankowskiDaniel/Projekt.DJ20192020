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
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./dj-css/style-index.css">
    <title>MyIt</title>
  </head>
  <body>
      <?php
      include_once("header.php"); //odwolanie do naglowka
       ?>



       <div class="col-sm-10 col-lg-6 col-xs-12" id="container-index-main">
         <div class="card border-0 shadow my-5">
           <div class="card-body p-5">
             <div id="carouselExampleControls" class="carousel slide col-sm-12" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 index-main" src="./images/tlumacz1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 index-main" src="./images/tlumacz.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 index-main" id="regege" src="./images/tlumacz3.jpg" alt="Third slide">
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
<button type="button" class="btn btn-outline-danger button-size" id="but1r"><a href="rejestracja.php" id="registered">Zarejestruj się</a></button>
<button type="button" class="btn btn-outline-info button-size" id="but1"><a href="logowanie.php" id="logined">Zaloguj się</a></button>
<script>
$("#but1r").mouseover(function(){
  $("#registered").css({"color": "white"});
})
$("#but1r").mouseout(function(){
  $("#registered").css({"color": "red"});
})
$("#but1").mouseover(function(){
  $("#logined").css({"color": "white"});
})
$("#but1").mouseout(function(){
  $("#logined").css({"color": "#4FA7FF"});
});
$("#but1r").click(function(e){
  e.preventDefault();
  window.location = "rejestracja.php";
});
$("#but1").click(function(e){
  e.preventDefault();
  window.location = "logowanie.php";
});
$("#regege").click(function(e){
  e.preventDefault();
  window.location = "rejestracja.php";
})
</script>
</div>
<div class="lead pictures-describe">
  <hr width="75%">
  <div class="row">
  <div class="col-md-4 col-sm-3"><img src="./images/describe.png" alt="picture1" id="describe"></div>
  <div class="col-md-8 col-sm-9">
  <p>Zapomnij o nieefektywnym uczeniu się słówek! Odkrywaj nowe metody nauczania i wybierz swój indywidualny styl, najlepszy dla ciebie!</p>

  </div>
  <hr width="75%">
</div>
<!--w tym miejscu robic dalej describy -->
<div class="row">
  <div class="col-md-4 col-sm-3"><img src="./images/describe1.png" alt="picture1" id="describe"></div>
  <div class="col-md-8 col-sm-9">
  <p>Zapisuj swój progres nauki i powracaj do słówek, kiedy tylko chcesz! To takie proste!</p>
  </div>
  <hr width="75%">
</div>
<div class="row">
<div class="col-md-4 col-sm-3"><img src="./images/describe2.png" alt="picture1" id="describe"></div>
<div class="col-md-8 col-sm-9">
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
