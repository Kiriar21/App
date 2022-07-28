<?php
include("header.php"); 
include("connect.php");
?>
<?php
   include("navigationMenu.php");
?>
    Edytuj informację ogólne<br><br>
    <form action="editInfo2.php" method="POST" autocomplete="off">
        <?php
            $ask="SELECT * from tytul";
            if($resultat = mysqli_query($conn1,$ask)){
                if(mysqli_num_rows($resultat)){
                    while($row = mysqli_fetch_array($resultat)){
                        echo("Tytul Imprezy: <input type='text' name='titleEvent1' value='$row[1]'>");
                        echo("Data Imprezy: <input type='date' name='dateEvent1' value='$row[2]'>");
                        echo("Miejscowość Imprezy: <input type='text' name='cityEvent1' value='$row[3]'>");
                        echo("<br><br>");
                    }                      
                }
            }
        ?>
        <input type='submit' value='Zapisz zmiany'>
    </form>
<?php
include("footer.php");
?>