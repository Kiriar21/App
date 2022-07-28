<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>
<form action="editUser2.php" method='POST' autocomplete="off">
<?php
    $information=$_POST['nrZaw'];
    echo("Informację o użytkowniku z numerem: ".$_POST['nrZaw']."<br>");
    ?>
   
<?php
    if(isset($_COOKIE['dodCol1'])){
        $dodCol1=",dodCol1";
    }
    else{
        $dodCol1="";
    }
    
    if(isset($_COOKIE['dodCol2'])){
        $dodCol2=",dodCol2";
    }
    else{
        $dodCol2="";
    }
    
    if(isset($_COOKIE['dodCol3'])){
        $dodCol3=",dodCol3";
    }
    else{
        $dodCol3="";
    }
    
    if(isset($_COOKIE['dodCol4'])){
        $dodCol4=",dodCol4";
    }
    else{
        $dodCol4="";
    }
    
    if(isset($_COOKIE['dodCol5'])){
        $dodCol5=",dodCol5";
    }
    else{
        $dodCol5="";
    }
    
    if(isset($_COOKIE['dodCol6'])){
        $dodCol6=",dodCol6";
    }
    else{
        $dodCol6="";
    }
    
    if(isset($_COOKIE['dodCol7'])){
        $dodCol7=",dodCol7";
    }
    else{
        $dodCol7="";
    }
    
    if(isset($_COOKIE['dodCol8'])){
        $dodCol8=",dodCol8";
    }
    else{
        $dodCol8="";
    }
    
    if(isset($_COOKIE['dodCol9'])){
        $dodCol9=",dodCol9";
    }
    else{
        $dodCol9="";
    }
    
    if(isset($_COOKIE['dodCol10'])){
        $dodCol10=",dodCol10";
    }
    else{
        $dodCol10="";
    }
    
    if(isset($_COOKIE['dodCol11'])){
        $dodCol11=",dodCol11";
    }
    else{
        $dodCol11="";
    }
    $nrChipUser=$_POST['nrChip'];
    $ask="SELECT dane.nr_zawodnika, dane.nr_chip, dane.klasyfikacja, dane.kategoria, dane.imie, dane.nazwisko, dane.plec, dane.wiek, dane.data_ur, dane.panstwo, dane.miasto, dane.nazwa_klubu, dane.email, dane.tel, dane.tel_ice, dane.anonimowy, dane.kwota_przelew, dane.kwota_start, dane.kwota_sklep, dane.kwota_ubezp, dane.data_przelew, dane.nr_transakcji,dane.status_oplaty, dane.data_rejestracji, dane.nr_gps, dane.status_zawodnika, dane.notatka, dane.dateMeta $dodCol1 $dodCol2 $dodCol3 $dodCol4 $dodCol5 $dodCol6 $dodCol7 $dodCol8 $dodCol9 $dodCol10 $dodCol11 from dane where nr_chip=$nrChipUser";

    if($res=mysqli_query($conn1,$ask)){
        if(mysqli_num_rows($res)){
            while($row=mysqli_fetch_array($res)){
                    echo("<input type='number' value='$row[1]' hidden name='nr_chip'><br>");
                    echo("Numer zawodnika: <input type='number' value='$row[0]' name='nr_zawodnika'><br>");
                    echo("Klasyfikacja: <input type='text' value='$row[2]' name='klasyfikacja'><br>");
                    echo("Kategoria: <input type='text' value='$row[3]' name='kategoria'><br>");
                    echo("Imie: <input type='text' value='$row[4]' name='imie'><br>");
                    echo("Nazwisko: <input type='text' value='$row[5]' name='nazwisko'><br>");
                    echo("Płeć: <input type='text' value='$row[6]' name='plec'><br>");
                    echo("Wiek: <input type='number' value='$row[7]' name='wiek'><br>");
                    echo("Data Urodzenia: <input type'date' value='$row[8]' name='data_ur'><br>");
                    echo("Państwo: <input type='text' value='$row[9]' name='panstwo'><br>");
                    echo("Miasto <input type='text' value='$row[10]' name='miasto'><br>");
                    echo("Nazwa Klubu <input type='text' value='$row[11]' name='nazwa_klubu'><br>");
                    echo("Email <input type='text' value='$row[12]' name='email'><br>");
                    echo("Telefon <input type='text' value='$row[13]' name='tel'><br>");
                    echo("Telefon ICE <input type='text' value='$row[14]' name='tel_ice'><br>");
                    echo("Anonimowy <input type='text' value='$row[15]' name='anonimowy'><br>");
                    echo("Kwota Przelewu <input type='text' value='$row[16]' name='kwota_przelew'><br>");
                    echo("Kwota Start <input type='text' value='$row[17]' name='kwota_start'><br>");
                    echo("Kwota Sklep <input type='text' value='$row[18]' name='kwota_sklep'><br>");
                    echo("Kwota ubezpieczenie <input type='text' value='$row[19]' name='kwota_ubezp'><br>");
                    echo("Data Przelewu <input type='date' value='$row[20]' name='data_przelew'><br>");
                    echo("Numer Transakcji <input type='text' value='$row[21]' name='nr_transakcji'><br>");
                    echo("Status Opłaty <input type='text' value='$row[22]' name='status_oplaty'><br>");
                    echo("Data Rejestracji <input type='date' value='$row[23]' name='data_rejestracji'><br>");
                    echo("Numer GPS <input type='text' value='$row[24]' name='nr_gps'><br>");
                    echo("Status Zawodnika <input type='text' value='$row[25]' name='status_zawodnika'><br>");
                    echo("Notatka <input type='text' value='$row[26]' name='notatka'><br>");
                    echo("Data Mety <input type='date' value='$row[27]' name='dateMeta'><br>");
                    $counter=29;
                    $counter1=28;
                    if(isset($_COOKIE['dodCol1'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol1'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol2'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol2'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol3'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol3'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol4'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol4'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol5'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol5'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol6'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol6'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol7'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol7'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol8'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol8'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol9'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol9'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol10'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol10'><br>");
                        $counter++;
                        $counter1++;
                    }
                    if(isset($_COOKIE['dodCol11'])){
                        echo($thTables[$counter][0]." <input type='text' value='$row[$counter1]' name='dodCol11'><br>");
                        $counter++;
                        $counter1++;
                    }
                    
            }
        }
    }
?>
<input type="submit" value='Zapisz Zmiany'></form>
<form action="addInfoMeta.php" method="post">
    <?php 
        echo("<input type='text' value='$information' name='nrzaw' hidden>");
        echo("<input type='text' hidden value='$nrChipUser' name='NrChip'>");
    ?>
    <input type="submit" value="Dodaj czas mety">
</form>
<?php
    echo("<form action='deleteUser.php' method='POST'>");
    echo("<input type='text' hidden value=$nrChipUser name='delNrChip'>");
    echo("<input type='submit' value='USUŃ UŻYTKOWNIKA'>");
    echo("</form>");
?>
<?php
include("footer.php");
?>