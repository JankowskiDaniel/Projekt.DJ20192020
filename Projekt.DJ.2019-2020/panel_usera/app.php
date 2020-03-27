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

           <div class="row api-shake">
             <h2 class="display-4" id="word"><span id="word-span"></span></h2>
           </div>
           <div class="row">
             <div class="col-md-12">
               <div class="col-md-12" id="translate-box">
               <input type="text" name="translate" value="" id="translate-word" placeholder="Odpowiedź:" autocomplete="off" required>
             </div>
             <div class="col-md-12" id="buttons-api">
             <button type="button" class="btn btn-outline-primary" id="previous">Previous</button>
             <button type="button" class="btn btn-outline-primary" id="check">Check</button>
             <button type="button" class="btn btn-outline-primary" id="wrong-word">Nie wiesz?</button>
             <button type="button" class="btn btn-outline-primary" id="next">Next</button>
           </div>
         </div>
       </div>
     <div class="row">
       

     </div>

               <script type="text/javascript">
               $(document).ready(function(){
               var words = <?php echo json_encode($words_array)?>;
               var words_length = <?php echo mysqli_num_rows($result_words)?>;
               document.getElementById('word-span').innerHTML=words[0].polskie_tlum;
               //document.getElementById('learned-paragraph').innerHTML="Nauczone słówka: "+"0/"+words_length;
               $("#wrong-word").hide();
               $("#translate-word").show();
               var i=0;
               var good_words =0;
               console.log(i);
               function next() {

                 $("#translate-word").css({"border-color": "#d3d3d3"});
                 $("#translate-word").show();
                  $("#word-answer").text("");
                 $("#wrong-word").hide();
                 $("#word").css({"margin-bottom": "0px"});
                 $("#learned-paragraph").css({"margin-top": "50px"});
                 $("#translate-word").val("");
                 i++;
                 console.log(i);
                 if(i>=words_length){

                   i=words_length-1;
                  // $("#word-span").hide();
                   $("#word-span").text(words[i].polskie_tlum);
                  // $("#word-span").fadeIn(1000);


                 } else {
                   //$("#word-span").hide();
                   /*$("#word-span").css({
                     'left': '300px', 'opacity': '0'
                   });
                   */
                   $("#word-span").css({'left': '200px','opacity': '0'});
                   $("#word-span").text(words[i].polskie_tlum);
                   $("#word-span").animate({
                     left: '0px',
                     opacity: '1'
                   }, 700);
               }
        };
               function previous() {
                 $("#translate-word").css({"border-color": "#d3d3d3"});
                 $("#translate-word").show();
                  $("#word-answer").text("");
                $("#wrong-word").hide();
                $("#word").css({"margin-bottom": "0px"});
                $("#learned-paragraph").css({"margin-top": "50px"});
                $("#translate-word").val("");
                i--;
                 if(i<0){
                   i=0;
                   //$("#word-span").hide();
                   $("#word-span").text(words[i].polskie_tlum);
                   //$("#word-span").fadeIn(1000);
                 } else {
                   $("#word-span").hide();
                   $("#word-span").text(words[i].polskie_tlum);
                   $("#word-span").fadeIn(1000);
               }
               };
               $("#next").click(function(){
                 next();
               });
               $("#previous").click(function(){
                 previous();
               })
               //////////////////////////////////////////////////////////// FUNKCJA SPRAWDZANIA POPRAWNOŚCI SŁOWA //////////////////////
               function check_word(){
                var wordin = document.getElementById('translate-word').value;
                wordin = wordin.trim();
                if(wordin == words[i].angielskie_tlum){
                  // CO SIE DZIEJE GDY DOBRZE
                  $("#translate-word").css({"border-color": "green"});
                  $("#word").css({"margin-bottom": "0px"});
                  $("#learned-paragraph").css({"margin-top": "50px"});
                  good_words++;
                  $("#word-span").animate({
                    left: '-150px',
                    opacity: '0'
                  }, 700, function(){
                    $("#word-span").css({'left': '200px','opacity': '0'});
                  });
                  setTimeout(next, 700);
                  if(good_words>=words_length){
                    good_words=words_length;

                  }
                  //document.getElementById('learned-paragraph').innerHTML="Nauczone słówka: "+good_words+"/"+words_length;
                } else {
                  // CO SIE DZIEJE JESLI ŹLE
                  $("#wrong-word").show();
                  $("#translate-word").css({"border-color": "red"});
                  $("#word-span").effect("shake", {times: 2, distance: 10});


                  good_words--;
                  if(good_words<0){
                    good_words=0;
                  }
                  //document.getElementById('learned-paragraph').innerHTML="Nauczone słówka: "+good_words+"/"+words_length;
                }
               }
               $("#check").click(function(){
                 check_word();

               })
               ////////////////////////////////////////////////////
               function msg_word(){
                 //$("#translate-word").hide();
                 $("#word").css({"margin-bottom": "50px"});
                 $("#learned-paragraph").css({"margin-top": "0px"});
                 $("#word-span").hide();
                 $("#word-span").text(words[i].angielskie_tlum);

                 $("#word-span").fadeIn(1500);
               }
               $("#wrong-word").click(function(){
                 msg_word();
               })
})
               </script>






          </div>

      </div>
    </div>
  </div>
  <div class="web_clear">
  </div>

<!-- TUTAJ ZACZYNA SIE STOPKA -->
<?php
include_once("footer_user.php"); //odwolanie do naglowka
 ?>
