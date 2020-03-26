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

<?php // IDEA: DRUGIE MENU ?>
<?php
$course = $_GET['id'];

 ?>
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

      <div class="col-lg-12 col-md-12 col-sm-12 api">
        <div class="box usercontent">
          <div class="headcontent toogle-menu">
          <h2 class="content_header"><?php echo $topic; ?></h2>
        </div>
        <div class="matter">
          <?php
// ŁADOWANIE SŁÓWEK DANEGO DZIAŁU DO UŻYTKOWNIKA
include_once("../connection.php");
$connection = mysqli_connect($host, $root, $password_database, $database_name);
mysqli_set_charset($connection, "utf8");
$words = "SELECT `polskie_tlum`,`angielskie_tlum` FROM `słowa` WHERE `Id_dzialu`=$course";
$result_words = mysqli_query($connection, $words);
$words_array = array();

while($row_words =  mysqli_fetch_array($result_words)){
  array_push($words_array, $row_words);
}
print_r($words_array);

//PRZEKAZYWANIE TABLICE WORDS_ARRAY NA FRONTA



           ?>

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
