<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>
<form action="U3.php">
    <input type="submit" value='Wyniki Ogólne'>
</form>
<form action="U4.php">
    <input type="submit" value='Wyniki Kategorii'>
</form>
<form action="U1.php" method="post">
    <input type="submit" value="Wybór Klasyfikacji">
</form>
<?php
    include("refreshButton.php");
?>
<?php
$counter2=29;
$counter3=0;
    if(isset($_COOKIE['dodCol1'])){
        $nameColumn=$_COOKIE['dodCol1'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,' ',dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol1='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol2'])){
        $nameColumn=$_COOKIE['dodCol2'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol2='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol3'])){
        $nameColumn=$_COOKIE['dodCol3'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol3='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol4'])){
        $nameColumn=$_COOKIE['dodCol4'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol4='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol5'])){
        $nameColumn=$_COOKIE['dodCol5'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol5='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol6'])){
        $nameColumn=$_COOKIE['dodCol6'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol6='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol7'])){
        $nameColumn=$_COOKIE['dodCol7'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol7='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol8'])){
        $nameColumn=$_COOKIE['dodCol8'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol18='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol9'])){
        $nameColumn=$_COOKIE['dodCol9'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol9='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol10'])){
        $nameColumn=$_COOKIE['dodCol10'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol10='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }    
    if(isset($_COOKIE['dodCol11'])){
        $nameColumn=$_COOKIE['dodCol11'];
        if(strstr($nameColumn,"Pliki")!==true && strstr($nameColumn,"pliki")!==true){
        $openNameClass = array("K","M");
        $counter1=0;
        foreach($openNameClass as $clas){
            $counter=1;
            $ask1="SELECT dane.nr_zawodnika, CONCAT(dane.imie,dane.nazwisko), dane.wiek, dane.miasto, dane.nazwa_klubu,$_COOKIE[nmMeta]wynik.wynik from dane JOIN $_COOKIE[nmMeta]wynik ON dane.nr_chip=$_COOKIE[nmMeta]wynik.nr_chip WHERE nr_zawodnika!=0 AND dodCol11='TAK' AND dane.status_oplaty='Opłacony' AND dane.status_zawodnika='Udział' AND dane.plec='$clas' GROUP BY $_COOKIE[nmMeta]wynik.nr_chip ORDER BY $_COOKIE[nmMeta]wynik.wynik LIMIT 3 ";
            if($resultat = mysqli_query($conn1,$ask1)){
                $counter1++;
                if(mysqli_num_rows($resultat)){
                     $counter3++;
                    echo("Dodatkowa Kategoria: ".$thTables[$counter2][0]."<br>");
                    if($counter1==1){
                        echo("Kategoria Kobiet<br>");
                    }
                    if($counter1==2){
                        echo("Kategoria Mężczyzn<br>");
                    }
                    echo("<table><tr><th>Miejsce</th><th>Nr</th><th>Biegacz</th><th>Wiek</th><th>Miasto</th><th>Nazwa Klubu</th><th>Meta</th></tr>");
                    while($row = mysqli_fetch_array($resultat)){
                        echo("<tr><td>$counter</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>");
                        $counter++;
                    }
                    echo("</table>");
                    
                }
            }
        }
    }
        $counter2++;
    }
    if(!$counter3){
        echo("Na ten moment brak wyników.");
    }
    ?>
<?php
include("footer.php");
?>