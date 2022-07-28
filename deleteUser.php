<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>


<?php
    $ask1="DELETE from dane WHERE nr_chip=$_POST[delNrChip]";
    if(mysqli_query($conn1,$ask1)){
        echo("Usunięto użytkownika poprawnie.");
    }
?>

<form action="showUsers.php" method='POST'>
<input type="submit" value='Wyświetl wszystkie Dane'>
</form>

<form action="showUsers2.php" method='POST'>
<input type="submit" value='Wyświetl podstawowe Dane'>
</form>


<?php
include("footer.php");
?>