<?php
include("header.php"); 
include("connect.php");
?>

    <?php
        $ask='SELECT dane.nr_zawodnika, dane.imie, dane.nazwisko, dane.wiek, dane.kategoria, dane.klasyfikacja, dane.tel, '.$_COOKIE['nmMeta'].'wynik.wynik FROM dane JOIN '.$_COOKIE['nmMeta'].'wynik ON dane.nr_chip='.$_COOKIE['nmMeta'].'wynik.nr_chip GROUP BY '.$_COOKIE['nmMeta'].'wynik.nr_chip ORDER BY '.$_COOKIE['nmMeta'].'wynik.wynik INTO OUTFILE "C:\\Users\\\Kiriar\\\Downloads\\\\'.$_COOKIE['nmMeta'].'wynik.csv" CHARACTER SET "cp1250" FIELDS TERMINATED BY "," ';
        if($result=mysqli_query($conn1,$ask)){
            echo("Pomyślnie eksportowano baze danych z wynikami.");
        }
        if(!$result){
            echo("Plik już został pobrany.");
        }
        
?>
<form action="/scoresSelectMeta.php" method="POST">
    <input type="submit" value="Powrót">
</form>
<?php
        include("footer.php");
    ?>