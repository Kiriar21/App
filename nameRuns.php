<?php
include("header.php"); 
include("connect.php");
?>
<main>
    <h4 class='step'>Krok 3: Uzupełnianie danych na temat biegu. Wpisz dane zgodnie z instrukcją.</h4>
    <form class='step_submit_page' action="/firstImpuls.php" method="POST">
        <?php
            $ask="SELECT klasyfikacja from dane WHERE dane.nr_zawodnika!=0 GROUP BY klasyfikacja;";
            if($resultat = mysqli_query($conn1,$ask)){
                if(mysqli_num_rows($resultat)){
                    while($row = mysqli_fetch_array($resultat)){
                        $ask1 = "CREATE TABLE `$row[0]meta` (
                            `nameCT` text NOT NULL,
                            `ID` int(11) NOT NULL,
                            `nazwaOdczytu` varchar(100) NOT NULL,
                            `nr_chip` int(11) NOT NULL,
                            `czas_meta` time(2) NOT NULL DEFAULT '00:00:00.00',
                            `impuls` int(11) NOT NULL,
                            `nazwaPobrania` varchar(55) NOT NULL,
                            `silaSygnalu` int(11) NOT NULL,
                            PRIMARY KEY (`ID`))
                           ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
                           if(!mysqli_query($conn1,$ask1)){
                                echo("Blad podczas tworzenia tabel met dla klasyfikacji");
                           }
                        $ask2 = "INSERT INTO `klasyfikacje` (`id`, `nazwaKlasyfikacji`) VALUES (NULL, '$row[0]');";
                           if(!mysqli_query($conn1,$ask2)){
                                echo("Błąd podczas dodawania klasyfikacji do specjalnej tabeli.");
                           }
                        $ask3= "CREATE TABLE  `$row[0]wynik` (`id` INT NOT NULL AUTO_INCREMENT , `nr_chip` INT NOT NULL , `wynik` TIME(3) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
                        if(!mysqli_query($conn1,$ask3)){
                            echo("Blad przy zapytaniu o tabele danych.");
                            echo('<form action="main.php">');
                            echo('<input type="submit" value="Zacznij od nowa">');
                            echo('</form>');
                        }
                    }
                }   
                else{
                    echo("Błąd. Brak wyników z klasyfikacji.");
                    echo('<form action="main.php">');
                    echo('<input type="submit" value="Zacznij od nowa">');
                    echo('</form>');
                }
            }
            else{
                echo("Blad przy zapytaniu o klafysikacje.");
                echo('<form action="main.php">');
                echo('<input type="submit" value="Zacznij od nowa">');
                echo('</form>');
            }
            $ask4="SELECT dane.dodCol1, dane.dodCol2, dane.dodCol3, dane.dodCol4,dane.dodCol5,dane.dodCol6,dane.dodCol7,dane.dodCol8,dane.dodCol9, dane.dodCol10, dane.dodCol11  FROM `dane` where nr_zawodnika=0;";
            if($res = mysqli_query($conn1,$ask4)){
                if(mysqli_num_rows($res)){
                    while($row = mysqli_fetch_array($res)){
                        $counter=1;
                        while($counter<12){
                            if($row[$counter-1]!="" || $row[$counter-1]!=" "){
                                setcookie('dodCol'.$counter, $row[$counter-1], time()+60 * 60 * 24 * 30, "/","", 0);
                            }
                            $counter++;
                        }
                    }
                }
            }
        ?>
        <input class='submit_button' type="submit" value="Uzupełnij dane">
    </form>
    </main>
<?php
include("footer.php");
?>