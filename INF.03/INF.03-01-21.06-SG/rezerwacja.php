<?php
if(isset($_POST['data']) && isset($_POST['osoby']) && isset($_POST['telefon'])){
   $osoby = $_POST['osoby'];
    $data = $_POST['data'];
    $telefon = $_POST['telefon'];
    $connect = mysqli_connect('localhost','root','','baza1');
    $query = "INSERT INTO `rezerwacje`(`nr_stolika`, `data_rez`, `liczba_osob`, `telefon`) VALUES (NULL,'$data','$osoby','$telefon');";
    $result = mysqli_query($connect,$query); 
    echo "Dodano rezerwacje do bazy danych";

    mysqli_close($connect);

}