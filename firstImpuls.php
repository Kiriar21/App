<?php
include("header.php"); 
include("connect.php");
?>
 <main>
    <h4 class='step'>Krok 3: Uzupełnianie danych na temat biegu. Wpisz dane zgodnie z instrukcją.</h4>
    <form id='kl_data' action="/saveImpuls.php" method="POST" autocomplete="off">
    <?php
     $ask="SELECT id, nazwaKlasyfikacji from klasyfikacje";
     if($resultat = mysqli_query($conn1,$ask)){
         if(mysqli_num_rows($resultat)){
             while($row = mysqli_fetch_array($resultat)){
                echo("<div class='kl_row'>");
                echo("<div>Klasyfikacja: <input style='width: 60px;' type='text' disabled name='classification' value=$row[1]></div>");
                echo("<div>Nazwa Klasyfikacji: <input style='width: 200px;' type='text' value='Nazwa Klasyfikacji' placeholder='Nazwa Klasyfikacji' name='nameClass$row[1]'></div>");                //Do wpisania
                echo("<div>Impuls mety: <input style='width: 25px;' type='number' value='1' placeholder='Numer Impulsu' name='impuls$row[1]'></div>");
                echo("<div>Czas Startu: <input style='width: 80px;' type='text' value='00:00:00.000' placeholder='00:00:00.000' name='timeS$row[1]'></div>");
                echo("</div><br>");
            }
             echo("<br><input class='submit_button' type='submit' value='Zapisz zmiany'>");                       
        }
        else{
            echo("Brak klasyfikacji w bazie danych.");
            echo('<form action="main.php">');
            echo('<input type="submit" value="Zacznij od nowa">');
            echo('</form>');
        }
    }
?>
    </form>
    <?php
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
    ?>
    </main>
<?php
include("footer.php");
?>