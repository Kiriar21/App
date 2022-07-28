<?php
include("header.php");
if(isset($_POST['nameDB'])){
    $named = $_POST['nameDB'];
    setcookie('nameDB', $named, time()+60 * 60 * 24 * 30, "/","", 0);
   }  
if(isset($_POST['titleEvent'])){
    $titEv = $_POST['titleEvent'];
    setcookie("titleEvent", $titEv, time()+60 * 60 * 24 * 30, "/","", 0);
   }
if(isset($_POST['cityEvent'])){
    $citEv = $_POST['cityEvent'];
    setcookie("cityEvent", $citEv, time()+60 * 60 * 24 * 30, "/","", 0);
   }
?>  
    Krok 1. Ustawienia zapisano poprawnie. Możemy przejść dalej.
    <form action="addInfo.php" method="POST">
        <input type="submit" value="Kolejny krok">
    </form>