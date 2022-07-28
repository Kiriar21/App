<?php
include("header.php"); 
include("connect.php");
?>
<main>
<?php
$ask10="SELECT data FROM `tytul`";
if($resultat = mysqli_query($conn1,$ask10)){
    if(mysqli_num_rows($resultat)){
        while($row = mysqli_fetch_array($resultat)){
            setcookie('timeStart', $row[0], time()+60 * 60 * 24 * 30, "/","", 0);
        }
    }
}
if(isset($_POST['fileEventUsers'])){
    $ask4='LOAD DATA INFILE "C:/Users/puste/Downloads/'.$_POST['fileEventUsers'].'" IGNORE INTO TABLE dane CHARACTER SET "cp1250" FIELDS TERMINATED BY "\t";';
    if(mysqli_query($conn1,$ask4)){
        $ask5="CREATE TABLE klasyfikacje (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nazwaKlasyfikacji` TEXT NOT NULL ,
            `tytulKlasyfikacji` TEXT NOT NULL DEFAULT '',
            `impulsMeta` int(11) NOT NULL  DEFAULT 0,
            `czas_start` time(2) NOT NULL DEFAULT '00:00:00.00',
            PRIMARY KEY (`id`))
            ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
        if(mysqli_query($conn1,$ask5)){
            echo("<h4 class='step'>Krok 2: Uzupełnienie danych o uczestnikach imprezy. Podążaj zgodnie z instrukcją.</h4>");
        }
        else{
            ?>
            <script>
                alert("Blad podczas tworzenia listy klasyfikacji. Sprawdź poprawność wprowadzonych danych.");
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
            alert("Blad podczas dodawania uzytkowników do tabeli. Sprawdź poprawność wprowadzonych danych.");
        </script>
                <form action="main.php">
                <input type="submit" value="Zacznij od nowa">
            </form>
        <?php
    }
}
?>
<form class='step_submit_page' action="nameRuns.php" method="POST">
<p class='input_title'>Dane zapisane poprawnie, przejdź do następnego kroku.</p><br><br>
<input class='submit_button' type="submit" value="Kolejny krok">
</form>
</main>
<?php
include("footer.php");
?>
