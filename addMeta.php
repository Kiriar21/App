<?php
include("header.php");
include("connect.php");
?>
<?php
   include("navigationMenu.php");
?>
Dodaj pliki tekstowe z mety z informacjami o przybiegnieciu<br><br>
<form action="addMeta2.php" method="POST">
    <?php
        $ask="SELECT * from klasyfikacje";
        if($resultat = mysqli_query($conn1,$ask)){
            if(mysqli_num_rows($resultat)){
                while($row = mysqli_fetch_array($resultat)){
                    echo("Klasyfikacja: <input type='text' disabled name='classification' value=$row[1]>&#09;&#09;&#09;"); 
                    echo("Plik z danymi: <input type='file'  name='file$row[1]'>&#09;&#09;&#09;"); 
                    echo("<br><br>");   
                }
            }
        }
    ?>
<input type="submit" value='Dodaj pliki'>
</form>
<?php
include("footer.php");
?>