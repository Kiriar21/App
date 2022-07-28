<?php
include("header.php");
include("connect.php");
?>
<!-- Do zrobienia ładny desing dla ludzi -->
<form action="U2.php" method="POST">
        <?php
    $ask="SELECT * from klasyfikacje";
    if($resultat = mysqli_query($conn1,$ask)){
        if(mysqli_num_rows($resultat)){
            echo("<select name='nmMeta'>");
            while($row = mysqli_fetch_array($resultat)){
                echo("<option value='$row[0]|$row[1]|$row[3]|$row[4]|$row[2]'> $row[1] </option>");
            }
            echo("</select>");
        }
    }
        ?>
        <br><input type="submit" value='Pokaż wyniki dla wybranej klasyfikacji'>
</form>
<?php
include("footer.php");
?>