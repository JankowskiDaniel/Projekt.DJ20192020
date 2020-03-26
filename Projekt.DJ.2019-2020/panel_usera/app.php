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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

while($row_words =  mysqli_fetch_assoc($result_words)){
  array_push($words_array, $row_words);
}


//PRZEKAZYWANIE TABLICE WORDS_ARRAY NA FRONTA



           ?>
           <script type="text/javascript">
           var words = <?php echo json_encode($words_array)?>;
           var words_length = <?php echo mysqli_num_rows($result_words)?>;
           console.log(words[0].polskie_tlum);
           console.log(words_length);
           </script>
           <div class="row">
             <h2 class="display-4" id="word"></h2>
           </div>
           <div class="row">
             <div class="col-md-2">
               <p class="text-center" id="chuj">Nauczone słówka:</p>
             </div>
             <div class="col-md-10">

               <div id="translate-box">

               <input type="text" name="translate" value="" id="translate-word" placeholder="Odpowiedź:" autocomplete="off" required>
               <script>
                document.getElementById('word').innerHTML=words[0].polskie_tlum;
                document.getElementById('chuj').innerHTML="Nauczone słówka: "+"0/"+words_length;
               </script>
             </div>
             <button type="button" class="btn btn-outline-primary" id="previous">Previous</button>
             <button type="button" class="btn btn-outline-primary" id="next">Next</button>
             <button type="button" class="btn btn-outline-primary" id="check">Check</button>
               <script type="text/javascript">
               var i=0;
               var good_words =0;
               function test() {
                 if(i>=words_length){
                   i=words_length-1;
                   document.getElementById('word').innerHTML=words[i].polskie_tlum;
                   document.getElementById('translate-word').value="";
                 } else {
                 i++;
                 document.getElementById('word').innerHTML=words[i].polskie_tlum;
                 document.getElementById('translate-word').value="";
               }
               };
               function test1() {
                 if(i<0){
                   i=0;
                   document.getElementById('word').innerHTML=words[i].polskie_tlum;
                   document.getElementById('translate-word').value="";
                 } else {
                 i--;
                 document.getElementById('word').innerHTML=words[i].polskie_tlum;
                 document.getElementById('translate-word').value="";
               }
               };
               $("#next").click(function(){
                 test();
               });
               $("#previous").click(function(){
                 test1();
               })
               ////////////////////////////////////////////////////////////
               function test3(){
                var wordin = document.getElementById('translate-word').value;
                if(wordin == words[i].angielskie_tlum){
                  alert("Bardzo dobrze!");
                  good_words++;
                  if(good_words>=words_length){
                    good_words=words_length;
                  }
                  document.getElementById('chuj').innerHTML="Nauczone słówka: "+good_words+"/"+words_length;
                } else {
                  alert("Źle");
                  good_words--;
                  if(good_words<0){
                    good_words=0;
                  }
                  document.getElementById('chuj').innerHTML="Nauczone słówka: "+good_words+"/"+words_length;
                }
               }
               $("#check").click(function(){
                 test3();
               })
               </script>





             </div>
           </div>
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
