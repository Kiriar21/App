<?php
include("header.php");
include("connect.php");
?>  
    <?php
    if(isset($_COOKIE['dodCol1'])){
        $dodCol1dodCol1=$_POST['dodCol1'];
        $dodCol1=", '$dodCol1dodCol1' ";
    }
    else{
        $dodCol1=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol2'])){
        $dodCol2dodCol2=$_POST['dodCol2'];
        $dodCol2=", '$dodCol2dodCol2' ";
    }
    else{
        $dodCol2=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol3'])){
        $dodCol3dodCol3=$_POST['dodCol3'];
        $dodCol3=", '$dodCol3dodCol3' ";
    }
    else{
        $dodCol3=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol4'])){
        $dodCol4dodCol4=$_POST['dodCol4'];
        $dodCol4=", '$dodCol4dodCol4' ";
    }
    else{
        $dodCol4=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol5'])){
        $dodCol5dodCol5=$_POST['dodCol5'];
        $dodCol5=", '$dodCol5dodCol5' ";
    }
    else{
        $dodCol5=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol6'])){
        $dodCol6dodCol6=$_POST['dodCol6'];
        $dodCol6=", '$dodCol6dodCol6' ";
    }
    else{
        $dodCol6=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol7'])){
        $dodCol7dodCol7=$_POST['dodCol7'];
        $dodCol7=", '$dodCol7dodCol7' ";
    }
    else{
        $dodCol7=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol8'])){
        $dodCol8dodCol8=$_POST['dodCol8'];
        $dodCol8=", '$dodCol8dodCol8' ";
    }
    else{
        $dodCol8=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol9'])){
        $dodCol9dodCol9=$_POST['dodCol9'];
        $dodCol9=", '$dodCol9dodCol9' ";
    }
    else{
        $dodCol9=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol10'])){
        $dodCol10dodCol10=$_POST['dodCol10'];
        $dodCol10=",, '$dodCol10dodCol10' ";
    }
    else{
        $dodCol10=" , ' ' ";
    }
    
    if(isset($_COOKIE['dodCol11'])){
        $dodCol11dodCol11=$_POST['dodCol11'];
        $dodCol11=",, '$dodCol11dodCol11' ";
    }
    else{
        $dodCol11=" , ' ' ";
    }
        if(isset($_POST['nrRuner']) && isset($_POST['nrChip'])){
            $nrR = $_POST['nrRuner'];
            $nrC = $_POST['nrChip'];
            $ask1="SELECT nr_zawodnika from dane where nr_zawodnika = $nrR ";
            $ask2="SELECT nr_chip from dane where nr_chip = $nrC";
            if($resul1 = mysqli_query($conn1,$ask1)){
                if(mysqli_num_rows($resul1)){
                        echo("Niestety podany numer zawodnika widnieje w bazie. Wprowadz inny numer.");
                }
                elseif($resul2 = mysqli_query($conn1,$ask2)){
                    if(mysqli_num_rows($resul2)){
                            echo("Niestety podany numer chip widnieje w bazie. Wprowadz inny numer.");
                    }
                    else{
                        if(isset($_POST['anonim'])){
                            $anonim="TAK";
                        } 
                        else{ 
                            $anonim="";
                        }
                        $ask="INSERT INTO `dane` (`nr_zawodnika`, `nr_chip`, `klasyfikacja`, `kategoria`, `imie`, `nazwisko`, `plec`, `wiek`, `data_ur`, `panstwo`, `miasto`, `nazwa_klubu`, `email`, `tel`, `tel_ice`, `anonimowy`, `kwota_przelew`, `kwota_start`, `kwota_sklep`, `kwota_ubezp`, `data_przelew`, `nr_transakcji`, `status_oplaty`, `data_rejestracji`, `nr_gps`, `status_zawodnika`, `notatka`, `dateMeta`, `dodCol1`, `dodCol2`, `dodCol3`, `dodCol4`, `dodCol5`, `dodCol6`, `dodCol7`, `dodCol8`, `dodCol9`, `dodCol10`, `dodCol11`) VALUES ('$_POST[nrRuner]', '$_POST[nrChip]', '$_POST[clasyfication]', '$_POST[category]', '$_POST[nameRuner]', '$_POST[secondNameRuner]', '$_POST[sexRuner]', '$_POST[ageRuner]', '$_POST[dateBirthday]', '$_POST[countryRuner]', '$_POST[cityRuner]', '$_POST[nameClubRuner]', '$_POST[emailRuner]', '$_POST[telRuner]', '$_POST[telIceRuner]', '$anonim', '$_POST[amountTr]', '$_POST[amountStart]', '$_POST[amountShop]', '$_POST[amountIns]', current_timestamp(), '$_POST[nrTrans]', '$_POST[stTr]', current_timestamp() , '$_POST[nrGPS]', '$_POST[statusRuner]', '$_POST[noteRuner]', current_timestamp() $dodCol1 $dodCol2 $dodCol3 $dodCol4 $dodCol5 $dodCol6 $dodCol7 $dodCol8 $dodCol9 $dodCol10 $dodCol11)";
                        if(mysqli_query($conn1, $ask)){
                            echo("Pomyślnie dodano nowego użytkownika");
                        }
                        else{
                            echo("Nie można dodać użytkownika. Spróbuj ponownie.");
                        }
                    }
                }
            }
        }
           
    ?>
<form action="addingNewUser.php" method="POST">
<input type="submit" value='Dodaj użytkownika'>
</form>
<form action="information.php" method="POST">
<input type="submit" value='Powrót'>
</form>
<?php
include("footer.php");
?>