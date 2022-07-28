<?php
include("header.php");
include("connect.php");
?>
<form action="U3.php">
    <input type="submit" value='Wyniki Ogólne'>
</form>
<form action="U5.php" method="POST">
<input type="submit" value="Wynik dodatkowych Kategorii">
</form>
<form action="U1.php" method="post">
    <input type="submit" value="Wybór Klasyfikacji">
</form>
<?php
    include("refreshButton.php");
?>
<?php
    echo(" $_COOKIE[titl] - Wyniki Kategorii<br><br>");
    $openNameClass = array("K","M");
    $openIDWinner = array(-1,-2,-3,-4,-5,-6);
    $counter2=0;
    foreach($openNameClass as $clas){
        $ask2="SELECT dane.nr_zawodnika, concat(dane.imie,' ',dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu, $_COOKIE[nmMeta]wynik.wynik, dane.nr_chip FROM dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE  dane.plec='$clas' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3";
        if($resultat2=mysqli_query($conn1,$ask2)){
            if(mysqli_num_rows($resultat2)){
                $counter1=1;
                echo(" Kategoria OPEN $clas");
                echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                while($row2 = mysqli_fetch_array($resultat2)){
                    echo("<tr>");
                    echo("<td>$counter1</td><td>$row2[0]</td><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td><td>$row2[4]</td><td>$row2[5]</td>");
                    echo("</tr>");
                    $openIDWinner[$counter2]=$row2[6];
                    $counter1++;
                    $counter2++;
                } 
                echo("</table>");
            }
            else{
                if($clas=="K"){
                    echo("Chwilowy brak wyników.");
                }
                
            }
        } 
    }
    $ask1="SELECT nr_zawodnika, kategoria from dane where nr_zawodnika!=0 AND kategoria is NOT NULL AND kategoria!='' GROUP by kategoria;";
    if($resultat1 = mysqli_query($conn1,$ask1)){
        if(mysqli_num_rows($resultat1)){
            while($row1 = mysqli_fetch_array($resultat1)){
                $ask=" SELECT dane.nr_zawodnika, concat(dane.imie,' ',dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu, $_COOKIE[nmMeta]wynik.wynik FROM dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip JOIN klasyfikacje WHERE dane.nr_chip!=0 AND dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip AND dane.kategoria='$row1[1]' AND dane.nr_chip!=$openIDWinner[0] AND dane.nr_chip!=$openIDWinner[1] AND dane.nr_chip!=$openIDWinner[2] AND dane.nr_chip!=$openIDWinner[3] AND dane.nr_chip!=$openIDWinner[4] AND dane.nr_chip!=$openIDWinner[5]  AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3";
                if($resultat = mysqli_query($conn1,$ask)){
                    if(mysqli_num_rows($resultat)){ 
                            $counter=1;
                            echo(" Kategoria: $row1[1]");
                            echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Klub</th><th>Meta</th></tr>");
                        while($row = mysqli_fetch_array($resultat)){
                            echo("<tr>");
                            echo("<td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>");
                            echo("</tr>");
                            $counter++;
                        }
                            echo("</table>");
                    }

                }
            }
        }
        
        
    }
?>
<?php
include("footer.php");
?>