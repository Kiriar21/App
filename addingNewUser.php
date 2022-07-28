<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>
<?php
   include("navigationMenu.php");
?>
Dodaj nowego użytkownika do bazy danych: <br><br>
<form action="addingNewUser2.php" method="POST" autocomplete="off" onsubmit="return sprPopr()">
    **WYMAGANE**
Podaj numer zawodnika <input type="number" id='nrRuner' name='nrRuner' min='1'>
Podaj numer chip <input type="number" id='nrChip' name='nrChip' min='1'>
Wybierz Klasyfikacje <?php
$ask1="SELECT klasyfikacja from dane where dane.nr_zawodnika!=0 and klasyfikacja!='' GROUP BY klasyfikacja";
if($resultat1 = mysqli_query($conn1,$ask1)){
    if(mysqli_num_rows($resultat1)){
         echo("<select name='clasyfication' id='clasyfication'>");
        while($row1 = mysqli_fetch_array($resultat1)){
            echo("<option value='$row1[0]'>$row1[0]</option>");
        }   
        echo("</select>");
    }
}
?>
Wybierz Kategorie <?php
$ask0="SELECT klasyfikacja from dane where dane.klasyfikacja!='' AND dane.klasyfikacja!='Klasyfikac' AND dane.klasyfikacja!='Klasyfikacja'  group by klasyfikacja;";
if($res = mysqli_query($conn1,$ask0)){
    if(mysqli_num_rows($res)){
        echo("<select name='category' id='category'>");
        while($row = mysqli_fetch_array($res)){
            echo("<optgroup label='$row[0]'>");
            $ask1="SELECT kategoria from dane where dane.nr_zawodnika!=0 and kategoria!='' and klasyfikacja='$row[0]' GROUP BY kategoria";
            if($resultat1 = mysqli_query($conn1,$ask1)){
                if(mysqli_num_rows($resultat1)){
                    while($row1 = mysqli_fetch_array($resultat1)){
                        echo("<option value='$row1[0]'>$row1[0]</option>");
                    }   
                }
            }
            echo("</optgroup>");
        }
        echo("</select>");
    }
}

?>
Podaj plec zawodnika ('K'/'M') <select name="sexRuner" id="sexRuner"><option value="M">M</option><option value="K">K</option></select> 
Status Opłaty <select name="stTr"><option value="Opłacony">Opłacony</option><option value="Nieopłacony">Nieopłacony</option></select>
Status Zawodnika <select name="statusRuner" ><option value="Udział">Udział</option><option value="DNS">DNS</option><option value="DNF">DNF</option><option value="DQ">DQ</option><option value="DSQ">DSQ</option></select>
**WYMAGANE - KONIEC **
Podaj imie zawodnika <input type="text" name='nameRuner'>
Podaj Nazwisko zawodnika <input type="text" name='secondNameRuner'>
Podaj wiek zawodnika <input type="number" value='1' min='1' name='ageRuner'>
Podaj date urodzenia <input type="date" name='dateBirthday'>
Podaj Państwo <input type="text" value='POL' name='countryRuner'>
Podaj Miasto <input type="text" name='cityRuner'>
Podaj nazwe klubu <input type="text" name='nameClubRuner'>
Podaj e-mail <input type="text" name='emailRuner'>
Podaj nr telefonu <input type="text" name='telRuner'>
Podaj nr telefonu ICE <input type="text" name='telIceRuner'>
<input type="checkbox" value='TAK' name='anonim'>Anonimowy
Kwota przelewu: <input type='text' value='0.00' name='amountTr'>
Kwota start: <input type='text' value='0.00' name='amountStart'>
Kwota sklep: <input type='text' value='0.00' name='amountShop'>
Kwota ubezp: <input type='text' value='0.00' name='amountIns'>
Numer Transakcji <input type="text" name='nrTrans'>
Numer GPS <input type="text" name='nrGPS'>
Notatka <textarea name='noteRuner'></textarea>
<?php
$counter=29;
if(isset($_COOKIE['dodCol1'])){
        echo($thTables[$counter][0]."<select name='dodCol1'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol2'])){
        echo($thTables[$counter][0]."<select name='dodCol2'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol3'])){
        echo($thTables[$counter][0]."<select name='dodCol3'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol4'])){
        echo($thTables[$counter][0]."<select name='dodCol4'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol5'])){
        echo($thTables[$counter][0]."<select name='dodCol5'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol6'])){
        echo($thTables[$counter][0]."<select name='dodCol6'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol7'])){
        echo($thTables[$counter][0]."<select name='dodCol7'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol8'])){
        echo($thTables[$counter][0]."<select name='dodCol8'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol9'])){
        echo($thTables[$counter][0]."<select name='dodCol9'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol10'])){
        echo($thTables[$counter][0]."<select name='dodCol10'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
if(isset($_COOKIE['dodCol11'])){
        echo($thTables[$counter][0]."<select name='dodCol11'><option value=''></option><option value='TAK'>TAK</option></select>");
    $counter++;
}
?>

<input type="submit" value='Dodaj nowego użytkownika'>
<script>
    function sprPopr(){
        var nrZaw = document.getElementById("nrRuner").value;
        var nrChip= document.getElementById("nrChip").value;
        if(nrZaw=="" || nrChip==""){
            alert("Nie podano podstawowych wymaganych danych do utworzenia nowego zawodnika. Spróbuj ponownie.");
            return false;
        }    
        else{
            return true;
        }
    }
</script>
</form>
<?php
include("footer.php");
?>