<?php
include("header.php");
include("connect.php");
?>  
<?php
$nameClas;
$nrImp;
$timeS;
echo("Informację o mecie użytkownika z numerem: ".$_POST['nrzaw']."<br>");
$ask = "SELECT klasyfikacja from dane where nr_zawodnika = $_POST[nrzaw];";
if($res = mysqli_query($conn1,$ask)){
    if(mysqli_num_rows($res)){
        while($row = mysqli_fetch_array($res)){
            echo("Klasyfikacja w której bierze udział zawodnik: ".$row[0]."<br>");
            $nameClas=$row[0];
            $ask1="SELECT * from klasyfikacje WHERE nazwaKlasyfikacji='$nameClas'";
            if($res1=mysqli_query($conn1,$ask1)){
                if(mysqli_num_rows($res1)){
                    while($row1 = mysqli_fetch_array($res1)){
                        echo("Tytuł Klasyfikacji: $row1[2]     Ważny impuls Mety: $row1[3]        Czas rozpoczęcia: $row1[4]");
                        $nrImp=$row1[3];
                        $timeS=$row1[4];
                    }
                }
            }
        }
    }
}
?>
<form action="addInfoMeta2.php" method="post">
<?php

    $nrCh=$_POST['NrChip'];
    echo("<input type='number' hidden value='$nrCh' name='nrChip'> <br>");
    echo("<input type='text' hidden value='$nameClas' name='nmCl'> <br>");
    echo("Czas na Mecie: <input type='text'  placeholder='00:00:00.000' name='timeZaw' value='$timeS'><br>");
    echo("Impuls Pobrania: <input type='number' min=1  placeholder='numer_impulsu' name='nrImpuls' value='$nrImp'><br>");
?>
<input type="submit" value="Dodaj informację o wyniku">
</form>
<form action="information.php" method="post">
    <input type="submit" value="Powrót do menu">
</form>
<?php
include("footer.php");
?>  


