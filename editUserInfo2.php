<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>


<?php
    $ask="SELECT nr_chip from dane where nr_zawodnika!=0";
    if($res = mysqli_query($conn1,$ask)){
        if(mysqli_num_rows($res)){
            while($row=mysqli_fetch_array($res)){
                if(isset($_POST[$row[0].'|nr_zawodnika'])){
                    $nr_zawodnika = $_POST[$row[0].'|nr_zawodnika'];
                    $helpTable = explode('|',$nr_zawodnika);
                    if($row[0]==$helpTable[0]){
                        $klasyfikacja=$_POST[$row[0].'|klasyfikacja'];
                        $kategoria=$_POST[$row[0].'|kategoria'];
                        $imie=$_POST[$row[0].'|imie'];
                        $nazwisko=$_POST[$row[0].'|nazwisko'];
                        $plec=$_POST[$row[0].'|plec'];
                        $wiek=$_POST[$row[0].'|wiek'];
                        $data_ur=$_POST[$row[0].'|data_ur'];
                        $panstwo=$_POST[$row[0].'|panstwo'];
                        $miasto=$_POST[$row[0].'|miasto'];
                        $nazwa_klubu=$_POST[$row[0].'|nazwa_klubu'];
                        $email=$_POST[$row[0].'|email'];
                        $tel=$_POST[$row[0].'|tel'];
                        $tel_ice=$_POST[$row[0].'|tel_ice'];
                        $anonimowy=$_POST[$row[0].'|anonimowy'];
                        $kwota_przelew=$_POST[$row[0].'|kwota_przelew'];
                        $kwota_start=$_POST[$row[0].'|kwota_start'];
                        $kwota_sklep=$_POST[$row[0].'|kwota_sklep'];
                        $kwota_ubezp=$_POST[$row[0].'|kwota_ubezp'];
                        $data_przelew=$_POST[$row[0].'|data_przelew'];
                        $nr_transakcji=$_POST[$row[0].'|nr_transakcji'];
                        $status_oplaty=$_POST[$row[0].'|status_oplaty'];
                        $data_rejestracji=$_POST[$row[0].'|data_rejestracji'];
                        $nr_gps=$_POST[$row[0].'|nr_gps'];
                        $status_zawodnika=$_POST[$row[0].'|status_zawodnika'];
                        $notatka=$_POST[$row[0].'|notatka'];
                        $dateMeta=$_POST[$row[0].'|dateMeta']; 
                        if(isset($_COOKIE['dodCol1'])){
                            $dodCol1dodCol1=$_POST[$row[0].'|dodCol1'];
                            $dodCol1=",dodCol1='$dodCol1dodCol1'";
                        }
                        else{
                            $dodCol1="";
                        }
                        
                        if(isset($_COOKIE['dodCol2'])){
                            $dodCol2dodCol2=$_POST[$row[0].'|dodCol2'];
                            $dodCol2=",dodCol2='$dodCol2dodCol2'";
                        }
                        else{
                            $dodCol2="";
                        }
                        
                        if(isset($_COOKIE['dodCol3'])){
                            $dodCol3dodCol3=$_POST[$row[0].'|dodCol3'];
                            $dodCol3=",dodCol3='$dodCol3dodCol3'";
                        }
                        else{
                            $dodCol3="";
                        }
                        
                        if(isset($_COOKIE['dodCol4'])){
                            $dodCol4dodCol4=$_POST[$row[0].'|dodCol4'];
                            $dodCol4=",dodCol4='$dodCol4dodCol4'";
                        }
                        else{
                            $dodCol4="";
                        }
                        
                        if(isset($_COOKIE['dodCol5'])){
                            $dodCol5dodCol5=$_POST[$row[0].'|dodCol5'];
                            $dodCol5=",dodCol5='$dodCol5dodCol5'";
                        }
                        else{
                            $dodCol5="";
                        }
                        
                        if(isset($_COOKIE['dodCol6'])){
                            $dodCol6dodCol6=$_POST[$row[0].'|dodCol6'];
                            $dodCol6=",dodCol6='$dodCol6dodCol6'";
                        }
                        else{
                            $dodCol6="";
                        }
                        
                        if(isset($_COOKIE['dodCol7'])){
                            $dodCol7dodCol7=$_POST[$row[0].'|dodCol7'];
                            $dodCol7=",dodCol7='$dodCol7dodCol7'";
                        }
                        else{
                            $dodCol7="";
                        }
                        
                        if(isset($_COOKIE['dodCol8'])){
                            $dodCol8dodCol8=$_POST[$row[0].'|dodCol8'];
                            $dodCol8=",dodCol8='$dodCol8dodCol8'";
                        }
                        else{
                            $dodCol8="";
                        }
                        
                        if(isset($_COOKIE['dodCol9'])){
                            $dodCol9dodCol9=$_POST[$row[0].'|dodCol9'];
                            $dodCol9=",dodCol9='$dodCol9dodCol9'";
                        }
                        else{
                            $dodCol9="";
                        }
                        
                        if(isset($_COOKIE['dodCol10'])){
                            $dodCol10dodCol10=$_POST[$row[0].'|dodCol10'];
                            $dodCol10=",dodCol10='$dodCol10dodCol10'";
                        }
                        else{
                            $dodCol10="";
                        }
                        
                        if(isset($_COOKIE['dodCol11'])){
                            $dodCol11dodCol11=$_POST[$row[0].'|dodCol11'];
                            $dodCol11=",dodCol11='$dodCol11dodCol11'";
                        }
                        else{
                            $dodCol11="";
                        }
                        $ask1="UPDATE `dane` SET `nr_zawodnika`='$nr_zawodnika',`klasyfikacja`='$klasyfikacja',`kategoria`='$kategoria',`imie`='$imie',`nazwisko`='$nazwisko',
                        `plec`='$plec',`wiek`='$wiek',`data_ur`='$data_ur',`panstwo`='$panstwo',`miasto`='$miasto',
                        `nazwa_klubu`='$nazwa_klubu',`email`='$email',`tel`='$tel',`tel_ice`='$tel_ice',`anonimowy`='$anonimowy',
                        `kwota_przelew`='$kwota_przelew',`kwota_start`='$kwota_start',`kwota_sklep`='$kwota_sklep',`kwota_ubezp`='$kwota_ubezp',
                        `data_przelew`='$data_przelew',`nr_transakcji`='$nr_transakcji',`status_oplaty`='$status_oplaty',`data_rejestracji`='$data_rejestracji',
                        `nr_gps`='$nr_gps',`status_zawodnika`='$status_zawodnika',`notatka`='$notatka',`dateMeta`='$dateMeta' $dodCol1 $dodCol2 $dodCol3 $dodCol4 $dodCol5 $dodCol6 $dodCol7 $dodCol8 $dodCol9 $dodCol10 $dodCol11 WHERE nr_chip=$helpTable[0]; ";
                        if(mysqli_query($conn1,$ask1)){
                            echo("Pomyślnie zapisano zmiany dla użytkownika o numerze ".$nr_zawodnika."<br>");
                        }
                    }
                }
               
            }
        }
    }
    echo("<form action='editUserInfo.php' method='POST'>");
                            echo("<input type='submit' value='Powrót'>");
                            echo("</form>");
?>



<?php
include("footer.php");
?>