<?php
include("header.php");
include("connect.php");
   if(isset($_POST['titleEvent1']) && isset($_POST['dateEvent1']) && isset($_POST['cityEvent1']) ){
        $titleEvent1=$_POST['titleEvent1'];
        $dateEvent1=$_POST['dateEvent1'];
        $cityEvent1=$_POST['cityEvent1'];
        $ask2="UPDATE `tytul` SET `tytul`='$titleEvent1' , `data` = '$dateEvent1', `miejscowosc` = '$cityEvent1' WHERE id='1'; ";
        mysqli_query($conn1,$ask2);
        setcookie('timeStart', $dateEvent1, time()+60 * 60 * 24 * 30, "/","", 0);
    }                  

?>  
    Zapisano zmiany poprawnie.
    <form action="information.php" method="POST">
        <input type="submit" value="Powrót">
    </form>
    <?php
include("footer.php");
?>