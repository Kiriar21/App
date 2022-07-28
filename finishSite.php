<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>

Zakończono bieg. Dane potrzebne do działania strony zostały usunięte.
<!-- Czyszczenie ciastek z pamięci podręcznej przeglądarki -->
<?php
//createCookie.php
setcookie('nameDB', "", time()+60, "/","", 0);
setcookie('titleEvent', "", time()+60, "/","", 0);
setcookie('cityEvent', "", time()+60, "/","", 0);
//nameRuns.php && information.php
setcookie('dodCol1', "", time()+60, "/","", 0);
setcookie('dodCol2', "", time()+60, "/","", 0);
setcookie('dodCol3', "", time()+60, "/","", 0);
setcookie('dodCol4', "", time()+60, "/","", 0);
setcookie('dodCol5', "", time()+60, "/","", 0);
setcookie('dodCol6', "", time()+60, "/","", 0);
setcookie('dodCol7', "", time()+60, "/","", 0);
setcookie('dodCol8', "", time()+60, "/","", 0);
setcookie('dodCol9', "", time()+60, "/","", 0);
setcookie('dodCol10', "", time()+60, "/","", 0);
setcookie('dodCol11', "", time()+60, "/","", 0);
//infor.php and editInfo2.php
setcookie('timeStart', "", time()+60, "/","", 0);
//addMeta2.php - petla z nazwa.meta
$ask="SELECT * from klasyfikacje";
    if($resultat = mysqli_query($conn1,$ask)){
        if(mysqli_num_rows($resultat)){
            while($row = mysqli_fetch_array($resultat)){
                    setcookie('file'.$row[1], "", time()+60, "/","", 0);
                   } 
            }
        }
//scores.php
setcookie('nmMeta', "", time()+60, "/","", 0);
setcookie('imp', "", time()+60, "/","", 0);
setcookie('tim', "", time()+60, "/","", 0);
setcookie('titl', "", time()+60, "/","", 0); 
//idk
setcookie('nr_zawodnika',"",time()+60,"/","",0);
?>
<input type="button" value="Zamknij Strone" onclick="window.location.replace('https://google.pl/')">
<?php
include("footer.php");
?>