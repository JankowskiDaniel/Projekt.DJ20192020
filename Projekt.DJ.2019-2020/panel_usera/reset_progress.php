<?php
session_start();
if(!isset($_GET['id_course'])){
  header('Location: index_user.php');

} else {
  include_once("../connection.php");
  $connection = mysqli_connect($host, $root, $password_database, $database_name);
  if($connection->connect_errno!=0)
  {
    echo "blad";
  }
  else {
    $kurs = $_GET['id_course'];
    $id_usera = $_SESSION['id_user'];
  $connection = mysqli_connect($host, $root, $password_database, $database_name);
  mysqli_set_charset($connection, "utf8");
  $sql = "DELETE FROM `użytkownicy_kursy` WHERE `Id_użytkownika`=$id_usera and `Id_dzialu`=$kurs";
  $delete_words = "DELETE `użytkownicy_słowa` FROM `użytkownicy_słowa`\n"

    . "inner join `słowa` on `użytkownicy_słowa`.`Id_słowa`=`słowa`.`Id_slowa`\n"

    . "where `Id_użytkownika`=$id_usera and `Id_dzialu`=$kurs";
  mysqli_query($connection, $sql);
  mysqli_query($connection, $delete_words);
  header("Location: app.php?id=$kurs");
}
}
 ?>
