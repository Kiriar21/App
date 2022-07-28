<?php
include("header.php");
include("connect.php");
?>
<?php
   include("navigationMenu.php");
?>
<form action="" method="post" autocomplete="off" onsubmit="return validateNumberRunner()">
    Wyszukaj po numerze zawodnika: <input type="number" min='1' name='numberRuner' id="numberRuner" >
    <input type="submit" value="Wyszukaj">
</form>
<form action="" method="post">
    <input type="submit" value="Pokaż wszystkich">
</form>
<form action="scoresSelectCategory.php">
    <input type="submit" value='Wyniki Kategorii'>
</form>
<form action="/additionalCategory.php" method="POST">
<input type="submit" value="Wynik dodatkowych Kategorii">
</form>
<?php
    include("refreshButton.php");
?>
<form action="selSC.php" method="post">
    <input type="submit" value="Wybór Klasyfikacji">
</form>
<br>
**Tylko po zakończeniu całego biegu tej klasyfikacji**
<form action="exportScores.php">
    <input type="submit" value='Wyekportuj Wyniki '>
</form>
<?php
    if(isset($_POST['numberRuner'])){
        if($_POST['numberRuner']){
            $numerRuner=$_POST['numberRuner'];
            $numberRuner1=' AND nr_zawodnika='.$numerRuner;
        }
        else{
            $numberRuner1='';
        }    
    }
    else{
        $numberRuner1='';
    }
    echo(" $_COOKIE[titl] - Klasyfikacja Ogólna");
    $ask="SELECT dane.nr_zawodnika, concat(dane.imie,' ',dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu, $_COOKIE[nmMeta]wynik.wynik FROM dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' $numberRuner1 GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik ";
    if($resultat = mysqli_query($conn1,$ask)){
        if(mysqli_num_rows($resultat)){
            $counter=1;
            echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
            while($row = mysqli_fetch_array($resultat)){
                echo("<tr>");
                echo("<td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>");
                echo("</tr>");
                $counter++;
            }
            echo("</table>");
        }
        else{
            echo("<br><br>Chwilowy brak wyników.");
        }
    }


?>
<script src="numberRunner.js"></script>
<?php
include("footer.php");
?>