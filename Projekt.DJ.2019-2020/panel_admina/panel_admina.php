<?php
session_start();
if(!isset($_SESSION['iflogin'])){
  header('Location: ..\index.php');
  exit();
}
if($_SESSION['user_type']!=1){
  header('Location: ../panel_usera/index_user.php');
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
     <link rel="stylesheet" type="text/css" href="../dj-css/style.css">
     <title>Panel Administratora</title>
   </head>
   <body>
     <div class="container-fluid">
       <?php
       include_once("header_user.php"); //odwolanie do naglowka
        ?>
        <div class="row no-gutters second_row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <form class="form-group">
              <table class="admin_table">
                <tr class="admin_table_tr">
                  <td class="admin_table_td">ID usera</td>
                  <td class="admin_table_td">Nazwa użytkownika</td>
                  <td class="admin_table_td">E-mail</td>
                  <td class="admin_table_td">Data utworzenia konta</td>
                  <td class="admin_table_td">Typ konta</td>
                </tr>
              </table>
            </form>
          </div>
          <div class="web_clear">
          </div>
        </div>



        <?php
        include_once("footer_user.php"); //odwolanie do naglowka
       ?>
