<?php
include("header.php"); 
include("connect.php");
?>
<?php
   include("navigationMenu.php");
?>
    Edytuj informację na temat danej klasyfikcji oraz numrze impulsu pobieranego z mety.<br><br>
    <form action="editRuns2.php" method="POST" autocomplete="off">
        <?php
            $ask="SELECT * from klasyfikacje";
            if($resultat = mysqli_query($conn1,$ask)){
                if(mysqli_num_rows($resultat)){
                    while($row = mysqli_fetch_array($resultat)){
                        echo("Klasyfikacja: <input type='text' disabled name='classification' value=$row[1]>&#09;&#09;&#09;"); 
                        echo("Nazwa Klasyfikacji: <input type='text' name='nameClass$row[1]' value='$row[2]'> &#09;&#09;&#09;");               
                        echo("Impuls mety: <input type='number' name='impuls$row[1]' value='$row[3]'> &#09;&#09;&#09;");                       
                        echo("Czas Startu: <input type='text'  placeholder='00:00:00.000' name='timeS$row[1]' value='$row[4]'> &#09;&#09;&#09;");                       
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