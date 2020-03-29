<?php
session_start();
if(!isset($_SESSION['iflogin'])){
  header('Location: ..\index.php');
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
     <link rel="stylesheet" type="text/css" href="../dj-css/style.css">
     <title>Twoje kursy</title>
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
                  $id_usera = $_SESSION['id_user'];
                $connection = mysqli_connect($host, $root, $password_database, $database_name);
                mysqli_set_charset($connection, "utf8");
                $sql1 = "SELECT `Nazwa_dzialu`, `użytkownicy_kursy`.`Id_dzialu` from `użytkownicy_kursy` inner join `działy`on `użytkownicy_kursy`.`Id_dzialu`=`działy`.`Id_dzialu` where `Id_użytkownika`=$id_usera";
                $result1 = mysqli_query($connection, $sql1);
                if(mysqli_num_rows($result1)==0){
                  echo "<p class=\"text-center\">Nie masz obecnie ukończonych żadnych kursów.</p>";
                } else {
                echo "<table>";
                echo "<tr><th class=\"admin_table_td\">Nazwa kursu</th></tr>";
                  while($row = mysqli_fetch_assoc($result1))
                  {
                    echo <<< ROW
                    <tr class="admin_table_tr">
                    <td class="admin_table_td">$row[Nazwa_dzialu]</td>
                    <td class="admin_table_td"><a href="reset_course.php?id_course=$row[Id_dzialu]">Rozpocznij od nowa</a></td>
                    </tr>
                    ROW;


                  }
                  echo "</table>";
}
                    mysqli_close($connection);




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
