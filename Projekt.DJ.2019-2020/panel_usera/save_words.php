<?php
session_start();
if(!isset($_POST['ilosc'])){
  header('Location: index_user.php');
} else {
  $words = array();
  $id_user = $_SESSION['id_user'];
  $ilosc = $_POST['ilosc'];
  for ($i=0; $i < $ilosc ; $i++) {
    array_push($words, $_POST[$i]);
  }
  include_once("../connection.php");
  $connection = mysqli_connect($host, $root, $password_database, $database_name);
  mysqli_set_charset($connection, "utf8");
  $id_user = $_SESSION['id_user'];
  $array_id = array();
  for ($j=0; $j < count($words) ; $j++) {
    $sql = "SELECT `Id_slowa` from `słowa` where `polskie_tlum`='$words[$j]'";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result)){
      array_push($array_id, $row['Id_slowa']);
    }
  }
  for ($k=0; $k < count($array_id); $k++) {
    $add_words = "INSERT INTO `użytkownicy_słowa`(`Id_użytkownika`, `Id_słowa`) VALUES ($id_user,$array_id[$k])";
    mysqli_query($connection, $add_words);
  }
  header('Location: index_user.php');


}
 ?>
