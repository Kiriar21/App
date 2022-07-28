<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>


<?php
      if(isset($_COOKIE['dodCol1'])){
        $dodCol1dodCol1=$_POST['dodCol1'];
        $dodCol1=",dodCol1='$dodCol1dodCol1'";
    }
    else{
        $dodCol1="";
    }
    
    if(isset($_COOKIE['dodCol2'])){
        $dodCol2dodCol2=$_POST['dodCol2'];
        $dodCol2=",dodCol2='$dodCol2dodCol2'";
    }
    else{
        $dodCol2="";
    }
    
    if(isset($_COOKIE['dodCol3'])){
        $dodCol3dodCol3=$_POST['dodCol3'];
        $dodCol3=",dodCol3='$dodCol3dodCol3'";
    }
    else{
        $dodCol3="";
    }
    
    if(isset($_COOKIE['dodCol4'])){
        $dodCol4dodCol4=$_POST['dodCol4'];
        $dodCol4=",dodCol4='$dodCol4dodCol4'";
    }
    else{
        $dodCol4="";
    }
    
    if(isset($_COOKIE['dodCol5'])){
        $dodCol5dodCol5=$_POST['dodCol5'];
        $dodCol5=",dodCol5='$dodCol5dodCol5'";
    }
    else{
        $dodCol5="";
    }
    
    if(isset($_COOKIE['dodCol6'])){
        $dodCol6dodCol6=$_POST['dodCol6'];
        $dodCol6=",dodCol6='$dodCol6dodCol6'";
    }
    else{
        $dodCol6="";
    }
    
    if(isset($_COOKIE['dodCol7'])){
        $dodCol7dodCol7=$_POST['dodCol7'];
        $dodCol7=",dodCol7='$dodCol7dodCol7'";
    }
    else{
        $dodCol7="";
    }
    
    if(isset($_COOKIE['dodCol8'])){
        $dodCol8dodCol8=$_POST['dodCol8'];
        $dodCol8=",dodCol8='$dodCol8dodCol8'";
    }
    else{
        $dodCol8="";
    }
    
    if(isset($_COOKIE['dodCol9'])){
        $dodCol9dodCol9=$_POST['dodCol9'];
        $dodCol9=",dodCol9='$dodCol9dodCol9'";
    }
    else{
        $dodCol9="";
    }
    
    if(isset($_COOKIE['dodCol10'])){
        $dodCol10dodCol10=$_POST['dodCol10'];
        $dodCol10=",dodCol10='$dodCol10dodCol10'";
    }
    else{
        $dodCol10="";
    }
    
    if(isset($_COOKIE['dodCol11'])){
        $dodCol11dodCol11=$_POST['dodCol11'];
        $dodCol11=",dodCol11='$dodCol11dodCol11'";
    }
    else{
        $dodCol11="";
    }
    $ask1="UPDATE `dane` SET `nr_zawodnika`='$_POST[nr_zawodnika]',`klasyfikacja`='$_POST[klasyfikacja]',`kategoria`='$_POST[kategoria]',`imie`='$_POST[imie]',`nazwisko`='$_POST[nazwisko]',
    `plec`='$_POST[plec]',`wiek`='$_POST[wiek]',`data_ur`='$_POST[data_ur]',`panstwo`='$_POST[panstwo]',`miasto`='$_POST[miasto]',
    `nazwa_klubu`='$_POST[nazwa_klubu]',`email`='$_POST[email]',`tel`='$_POST[tel]',`tel_ice`='$_POST[tel_ice]',`anonimowy`='$_POST[anonimowy]',
    `kwota_przelew`='$_POST[kwota_przelew]',`kwota_start`='$_POST[kwota_start]',`kwota_sklep`='$_POST[kwota_sklep]',`kwota_ubezp`='$_POST[kwota_ubezp]',
    `data_przelew`='$_POST[data_przelew]',`nr_transakcji`='$_POST[nr_transakcji]',`status_oplaty`='$_POST[status_oplaty]',`data_rejestracji`='$_POST[data_rejestracji]',
    `nr_gps`='$_POST[nr_gps]',`status_zawodnika`='$_POST[status_zawodnika]',`notatka`='$_POST[notatka]',`dateMeta`='$_POST[dateMeta]' $dodCol1 $dodCol2 $dodCol3 $dodCol4 $dodCol5 $dodCol6 $dodCol7 $dodCol8 $dodCol9 $dodCol10 $dodCol11  WHERE nr_chip=$_POST[nr_chip]; ";
    if(mysqli_query($conn1,$ask1)){
        echo("Zapisano zmiany poprawnie.");
    }
?>

<form action="showUsers.php" method='POST'>
<input type="submit" value='Wyświetl wszystkie Dane'>
</form>

<form action="showUsers2.php" method='POST'>
<input type="submit" value='Wyświetl podstawowe Dane'>
</form>


<?php
include("footer.php");
?>