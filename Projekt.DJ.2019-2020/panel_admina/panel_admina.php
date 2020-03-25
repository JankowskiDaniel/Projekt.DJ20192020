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
            <div class="table_admin">

                <?php
                include_once("../connection.php");
                $connection = mysqli_connect($host, $root, $password_database, $database_name);
                if($connection->connect_errno!=0)
                {
                  echo "blad";
                }
                else {
                $connection = mysqli_connect($host, $root, $password_database, $database_name);
                mysqli_set_charset($connection, "utf8");
                $sql1 = "select Id_użytkownika, login, email, data_utworzenia ,Typ from użytkownicy";
                $result1 = mysqli_query($connection, $sql1);
                echo <<< TABELA
                  <table class="admin_table">
                  <tr class="admin_table_tr">
                  <th class="admin_table_td">ID usera</th>
                  <th class="admin_table_td">Nazwa użytkownika</th>
                  <th class="admin_table_td">E-mail</th>
                  <th class="admin_table_td">Data utworzenia konta</th>
                  <th class="admin_table_td">Typ konta</th>
                  <th class="admin_table_td">Usuń użytkownika</th>
                  <th class="admin_table_td">Aktualizuj użytkownika</th>
                  </tr>
                  TABELA;
                  while($row = mysqli_fetch_assoc($result1))
                  {
                    echo <<< ROW
                    <tr class="admin_table_tr">
                    <td class="admin_table_td">$row[Id_użytkownika]</td>
                    <td class="admin_table_td">$row[login]</td>
                    <td class="admin_table_td">$row[email]</td>
                    <td class="admin_table_td">$row[data_utworzenia]</td>
                    <td class="admin_table_td">$row[Typ]</td>
                    <td class="admin_table_td"><a href="delete_user.php?id=$row[Id_użytkownika]">Usun</a></td>
                    <td class="admin_table_td"><a href="?updateid=$row[Id_użytkownika]">Aktualizuj</a></td>
                    </tr>
                ROW;


                  }
                  echo "</table>";
                  if(isset($_GET['updateid'])){
                    $id = $_GET['updateid'];
                    include_once('../connection.php');
                    $connection = mysqli_connect($host, $root, $password_database, $database_name);
                    mysqli_set_charset($connection, "utf8");
                    $sql = "SELECT * from `użytkownicy` where `Id_użytkownika`=$id";
                    $result = mysqli_query($connection, $sql);
                    $user = mysqli_fetch_assoc($result);
                    echo <<< FORMUPDATE
                      <form class="form-group" action="update_user.php" method="post">
                      <input type="text" name="login" placeholder="Wpisz login:">
                      <input type="text" name="email" placeholder="Wpisz email:">
                      <input type="number" name="typ" min="1" max="2">
                      <input type="hidden" name="id" value="$id">
                      <input type="submit" name="" value="Aktualizuj">
                      </form>
                    FORMUPDATE;

                    mysqli_close($connection);




                  }
                }
                 ?>

                 </div>
          </div>
          <div class="web_clear">
          </div>
        </div>



        <?php
        include_once("footer_user.php"); //odwolanie do naglowka
       ?>
