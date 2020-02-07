<!DOCTYPE html>
<html lang="pl" dir="ltr">
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
             <form class="form-group" action="index.html" method="post">
               <p class="text-center">Podaj adres e-mail</p>
			   <input class="input_log" type="text" name="email" placeholder="np. example@gmail.com"</input>
			   <button type="submit" name="button" onclick="check()">Wyslij</button>
			               
			 </form>
           </div>
         </div>
         <div class="web_clear">
         </div>
       </div>



       <?php
       include_once("footer.php"); //odwolanie do naglowka
      ?>
