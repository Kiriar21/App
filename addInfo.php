<?php
include("header.php");
?>
<main>
<h4 class='step'>Krok 2: Uzupełnienie danych o uczestnikach imprezy. Podążaj zgodnie z instrukcją.</h4>
<div id='addinfo'>
<?php
    $dbhost='localhost';
    $dbuser='root';
    $dbpasswd='';
    $polaczenie = mysqli_connect($dbhost,$dbuser,$dbpasswd);
    if ($polaczenie -> connect_errno) {
        echo "Failed to connect to MySQL: " . $polaczenie -> connect_error;
        exit();
    }
    else{
        $ask4="DROP DATABASE IF EXISTS $_COOKIE[nameDB]";
        mysqli_query($polaczenie,$ask4);
        $ask = "CREATE DATABASE `$_COOKIE[nameDB]`;";
        if(mysqli_query($polaczenie,$ask)){
            include("connect.php");
            $ask1=" CREATE TABLE `dane` (
                `nr_zawodnika` int(11) NOT NULL,
                `nr_chip` int(11) NOT NULL,
                `klasyfikacja` varchar(10) NOT NULL,
                `kategoria` varchar(10) NOT NULL,
                `imie` varchar(50) NOT NULL,
                `nazwisko` varchar(50) NOT NULL,
                `plec` varchar(5) NOT NULL,
                `wiek` int(11) NOT NULL,
                `data_ur` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `panstwo` varchar(30) NOT NULL DEFAULT 'POL',
                `miasto` varchar(50) NOT NULL,
                `nazwa_klubu` varchar(50) NOT NULL,
                `email` varchar(70) NOT NULL,
                `tel` varchar(20) NOT NULL,
                `tel_ice` varchar(20) NOT NULL,
                `anonimowy` varchar(20) NOT NULL,
                `kwota_przelew` double NOT NULL,
                `kwota_start` double NOT NULL,
                `kwota_sklep` double NOT NULL,
                `kwota_ubezp` double NOT NULL,
                `data_przelew` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `nr_transakcji` varchar(50) NOT NULL,
                `status_oplaty` varchar(20) NOT NULL DEFAULT 'Nieopłacony',
                `data_rejestracji` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `nr_gps` varchar(30) NOT NULL,
                `status_zawodnika` varchar(30) NOT NULL,
                `notatka` varchar(555) NOT NULL,
                `dodCol1` text NOT NULL DEFAULT ' ',
                `dodCol2` text NOT NULL DEFAULT ' ',
                `dodCol3` text NOT NULL DEFAULT ' ',
                `dodCol4` text NOT NULL DEFAULT ' ',
                `dodCol5` text NOT NULL DEFAULT ' ',
                `dodCol6` text NOT NULL DEFAULT ' ',
                `dodCol7` text NOT NULL DEFAULT ' ',
                `dodCol8` text NOT NULL DEFAULT ' ',
                `dodCol9` text NOT NULL DEFAULT ' ',
                `dodCol10` text NOT NULL DEFAULT ' ',
                `dodCol11` text NOT NULL DEFAULT ' ',
                PRIMARY KEY (`nr_chip`))
                ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
            if(mysqli_query($conn1,$ask1)){
                $ask2="CREATE TABLE tytul (
                    `id` int(11) NOT NULL,
                    `tytul` TEXT NOT NULL ,
                    `data` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `miejscowosc` TEXT NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
                  if(mysqli_query($conn1,$ask2)){
                    $ask3="INSERT INTO `tytul` VALUES (1,'$_COOKIE[titleEvent]', current_timestamp(), '$_COOKIE[cityEvent]');";
                    if(mysqli_query($conn1,$ask3)){
                            echo("Wybierz plik z danymi użytkowników '.txt' po przerobieniu z instrukcji Excela. Pamiętaj że ma być zapisany w ścieżce C:\Users\\Nazwa\\Download<br>");
                    }
                    else{
                        ?>
                        <script>
                                alert("Blad podczas wstawienia informacji do tabeli z informacjami. Sprawdź poprawność wprowadzonych danych.");
                        </script>
                        <form action="main.php">
                            <input type="submit" value="Zacznij od nowa">
                        </form>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>
                        alert("Blad podczas tworzenia tabeli z informacjami. Sprawdź poprawność wprowadzonych danych.");
                    </script>
                         <form action="main.php">
                            <input type="submit" value="Zacznij od nowa">
                        </form>
                    <?php
                }
            }
            else{
                ?>
                <script>
                    alert("Blad podczas tworzenia tabeli użytkowników. Sprawdź poprawność wprowadzonych danych.");
                </script>
                         <form action="main.php">
                            <input type="submit" value="Zacznij od nowa">
                        </form>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("Blad podczas tworzenia bazy danych. Sprawdź poprawność wprowadzonych danych. ");
            </script>
                         <form action="main.php">
                            <input type="submit" value="Zacznij od nowa">
                        </form>
            <?php
            }
        }
?>
    <form action="infor.php" method="POST" onsubmit="return sprPlik()">
        <input type="file" id='fileUser' name="fileEventUsers"><br><br><br>
        <input type="submit" value="Wgraj dane">
    </form>

    <script>
        function sprPlik(){
            var file = document.getElementById('fileUser').value;
            if(!file){
                alert("Brak wprowadzonego pliku");
                window.location.reload();
                return false;
            }
            else{
                return true;
            }
        }
    </script>
        </div>
</main>
<?php
include("footer.php");
?>