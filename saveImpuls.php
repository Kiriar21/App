<?php
include("header.php"); 
include("connect.php");
?>
<main>
    <?php
        $ask="ALTER TABLE `dane` ADD `dateMeta` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `dodCol11`;";
        mysqli_query($conn1,$ask);
        $ask1="SELECT id, nazwaKlasyfikacji from klasyfikacje";
        if($resultat1 = mysqli_query($conn1,$ask1)){
            if(mysqli_num_rows($resultat1)){
                while($row1 = mysqli_fetch_array($resultat1)){
                    if(isset($_POST["nameClass".$row1[1]]) && isset($_POST["impuls".$row1[1]]) && isset($_POST["timeS".$row1[1]]) ){
                        $nameClass=$_POST["nameClass".$row1[1]];
                        $impuls=$_POST["impuls".$row1[1]];
                        $timeS=$_POST["timeS".$row1[1]];
                        $ask2="UPDATE `klasyfikacje` SET `tytulKlasyfikacji`='$nameClass' , `impulsMeta` = $impuls, `czas_start` = '$timeS' WHERE id=$row1[0]; ";
                        mysqli_query($conn1,$ask2);
                    }                  
                }
            }
        }
            echo(" Krok 3. Dane dotyczące biegów zostały zapisane poprawnie. <br><br> ");        
    ?>
    <form id='end' action="information.php" method="POST">
        <h3>Informacje zostały przetworzone, pomyślnie utworzono bazę danych.<br>Zakończ tworzenie bazy.</h3>
        <input class='submit_button' type="submit" value="Zakończ">
    </form>
    </main>
<?php
include("footer.php");
?>