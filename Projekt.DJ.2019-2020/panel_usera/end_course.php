<?php
session_start();
if(!isset($_GET['id_course']) || !isset($_GET['dzial'])){
  header('Location: index_user.php');
} else {
  $dzial = $_GET['dzial'];
  $id_dzialu = $_GET['id_course'];
  include_once("../connection.php");
  $connection = mysqli_connect($host, $root, $password_database, $database_name);
  if($connection->connect_errno!=0)
  {
    echo "blad";
  }
    else {
    $id_usera = $_SESSION['id_user'];
    mysqli_set_charset($connection, "utf8");
    $sql = "INSERT INTO `użytkownicy_kursy`(`Id_użytkownika`, `Id_dzialu`) VALUES ($id_usera,$id_dzialu)";
    mysqli_query($connection, $sql);
    header('Location: index_user.php');
}
}


 ?>
