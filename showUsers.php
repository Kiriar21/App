<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>
<?php
   include("navigationMenu.php");
?>
<form action="" method="POST" autocomplete="off" onsubmit="return validateNumberRunner()">

    Sortuj po:
    <select name='firstOrdered'>
    <?php
        $counter1=0;
          while($counter1<count($thTables)){
            echo("<option value='".$thTables[$counter1][1]."'>".$thTables[$counter1][0]."</option>");
            $counter1++;
        }
    ?>
    </select>
    <select name="firstBy">
        <option value="ASC">Rosnąco</option>
        <option value="DESC">Malejąco</option>
    </select>
    <select name='secondOrdered'>
    <?php
        $counter1=0;
          while($counter1<count($thTables)){
            echo("<option value='".$thTables[$counter1][1]."'>".$thTables[$counter1][0]."</option>");
            $counter1++;
        }
    ?>
    </select>
    <select name="secondBy">
        <option value="ASC">Rosnąco</option>
        <option value="DESC">Malejąco</option>
    </select>
    
        <br><br>
    Filtruj po:
        Klasyfikacja:
        <?php
            $askClass="SELECT klasyfikacja from dane WHERE nr_zawodnika!=0 group by klasyfikacja;";
            if($resultClass=mysqli_query($conn1,$askClass)){
                if(mysqli_num_rows($resultClass)){
                    echo("<select name='clas'>");
                    echo("<option value=''></option>");
                    while($rowClass=mysqli_fetch_array($resultClass)){
                        echo("<option value='".$rowClass[0]."'>".$rowClass[0]."</option>");
                    }
                    echo("</select>");
                }
            }
        ?>
        Kategoria:
        <?php
        $ask0="SELECT klasyfikacja from dane where dane.klasyfikacja!='' AND dane.klasyfikacja!='Klasyfikac' AND dane.klasyfikacja!='Klasyfikacja'  group by klasyfikacja;";
        if($res = mysqli_query($conn1,$ask0)){
            if(mysqli_num_rows($res)){
                echo("<select name='cat' id='category'>");
                echo("<option value=''></option>");
                while($row = mysqli_fetch_array($res)){
                    echo("<optgroup label='$row[0]'>");
                    $askCat="SELECT kategoria from dane WHERE nr_zawodnika!=0 and kategoria!='' and klasyfikacja='$row[0]' group by kategoria;";
                    if($resultCat=mysqli_query($conn1,$askCat)){
                        if(mysqli_num_rows($resultCat)){
                            while($rowCat=mysqli_fetch_array($resultCat)){
                                echo("<option value='".$rowCat[0]."'>".$rowCat[0]."</option>");
                            }
                        }
                    }
                    echo("</optgroup>");
                }
                echo("</select>");
            }
        }
        ?>
        Płeć:
        <?php
            $askSex="SELECT plec from dane WHERE nr_zawodnika!=0 AND plec='K' OR plec='M' group by plec;";
            if($resultSex=mysqli_query($conn1,$askSex)){
                if(mysqli_num_rows($resultSex)){
                    echo("<select name='sex'>");
                    echo("<option value=''></option>");
                    while($rowSex=mysqli_fetch_array($resultSex)){
                        echo("<option value='".$rowSex[0]."'>".$rowSex[0]."</option>");
                    }
                    echo("</select>");
                }
            }
        ?>
        Państwo:
        <?php
            $askCountry="SELECT panstwo from dane WHERE nr_zawodnika!=0 group by panstwo;";
            if($resultCountry=mysqli_query($conn1,$askCountry)){
                if(mysqli_num_rows($resultCountry)){
                    echo("<select name='country'>");
                    echo("<option value=''></option>");
                    while($rowCountry=mysqli_fetch_array($resultCountry)){
                        echo("<option value='".$rowCountry[0]."'>".$rowCountry[0]."</option>");
                    }
                    echo("</select>");
                }
            }
        ?>
        Klub:
        <?php
            $askClub="SELECT nazwa_klubu from dane WHERE nr_zawodnika!=0 group by nazwa_klubu;";
            if($resultClub=mysqli_query($conn1,$askClub)){
                if(mysqli_num_rows($resultClub)){
                    echo("<select name='club'>");
                    while($rowClub=mysqli_fetch_array($resultClub)){
                        echo("<option value='".$rowClub[0]."'>".$rowClub[0]."</option>");
                    }
                    echo("<option value='brak'>Brak Klubu</option>");
                    echo("</select>");
                }
            }
        ?>
    <br><br>
    Szukaj po numerze zawodnika: 
        <input type="number" min='1' name="numberRuner" id="numberRuner" >
        <br><br>
    <input type="submit" value="Pokaż">
</form>
<form action="" method="post">
    <input type="submit" value="Pokaż wszystkich">
</form>
<?php
   //Sort - ORDER BY
    if(isset($_POST['firstOrdered']) || isset($_POST['secondOrdered'])){
        if($_POST['firstOrdered']!="" || $_POST['secondOrdered']!=""){
            echo("Sortowanie:");
        }
        $firstBy = $_POST['firstBy'];
        $secondBy = $_POST['secondBy'];
        if($_POST['firstOrdered']!=""){
        $firstOrder=$_POST['firstOrdered'];
        $thCounter=1;
        while($thCounter<count($thTables)){
            if($thTables[$thCounter][1]==$firstOrder){
                echo($thTables[$thCounter][0]);
            }
            $thCounter++;
        }
            if($firstBy=="ASC"){
                echo(" rosnąco ");
            }
            else{
                echo(" malejąco ");
            }
        }
        else{
            $firstOrder='" "';
        }
        if($_POST['secondOrdered']!=""){
            $secondOrder=$_POST['secondOrdered'];
            $thCounter=1;
            while($thCounter<count($thTables)){
                if($thTables[$thCounter][1]==$secondOrder){
                    echo($thTables[$thCounter][0]);
                }
                $thCounter++;
            }
                if($secondBy=="ASC"){
                    echo(" rosnąco ");
                }
                else{
                    echo(" malejąco ");
                }
        }
        else{
            $secondOrder='" "';
        }
    }
    else{
        $firstOrder='" "';
        $secondOrder='" "';
        $firstBy = '" "';
        $secondBy = '" "'; 
    }
    echo("<br>");
    //Filtr - WHERE
    if(isset($_POST['clas']) || isset($_POST['cat']) || isset($_POST['sex'])|| isset($_POST['country'])|| isset($_POST['club']) ){
        if($_POST['clas']!=""){
            $whereClas=" AND klasyfikacja = '".$_POST['clas']."' ";
            $clasInfo=" Klasyfikacja: $_POST[clas]";
        }
        else{
            $whereClas='';
            $clasInfo=" ";
        }

        if($_POST['cat']!=""){
            $whereCat=" AND kategoria = '".$_POST['cat']."' ";
            $catInfo=" Kategoria: $_POST[cat]";
        }
        else{
            $whereCat='';
            $catInfo=" ";
        }

        if($_POST['sex']!=""){
            $whereSex=" AND plec = '".$_POST['sex']."' ";
            $sexInfo=" Płeć: $_POST[sex]";
        }
        else{
            $whereSex='';
            $sexInfo=" ";
        }

        if($_POST['country']!=""){
            $whereCountry=" AND panstwo = '".$_POST['country']."' ";
            $countryInfo=" Państwo: $_POST[country]";
        }
        else{
            $whereCountry='';
            $countryInfo =" ";
        }

        if($_POST['club']!=""){
            if($_POST['club']!="brak"){
                $whereClub=" AND nazwa_klubu = '".$_POST['club']."' ";
                $clubInfo=" Klub: $_POST[club]";
            }
            else{
                $whereClub=" AND nazwa_klubu = ' '";
                $clubInfo=" Klub: Brak";
            }
           
        }
        else{
            $whereClub='';
            $clubInfo=" ";
        }
        if($clasInfo!=" " || $catInfo!=" " || $sexInfo!=" " || $countryInfo!=" " || $clubInfo!=" "){
            echo("Filtrowanie: ".$clasInfo." ".$catInfo." ".$sexInfo." ".$countryInfo." ".$clubInfo." <br>");
        }
    }
    else{
        $whereClas= '';
        $whereCat='';
        $whereSex='';
        $whereCountry='';
        $whereClub='';
    }
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
    if(isset($_POST['numberRuner'])){
        if($_POST['numberRuner']){
            $numerRuner=$_POST['numberRuner'];
            $numberRuner1=' AND nr_zawodnika='.$numerRuner;
        }
        else{
            $numberRuner1='';
        }    
    }
    else{
        $numberRuner1='';
    }
    $ask1="SELECT dane.nr_zawodnika, dane.nr_chip, dane.klasyfikacja, dane.kategoria, dane.imie, dane.nazwisko, dane.plec, dane.wiek, dane.data_ur, dane.panstwo, dane.miasto, dane.nazwa_klubu, dane.email, dane.tel, dane.tel_ice, dane.anonimowy, dane.kwota_przelew, dane.kwota_start, dane.kwota_sklep, dane.kwota_ubezp, dane.data_przelew, dane.nr_transakcji,dane.status_oplaty, dane.data_rejestracji, dane.nr_gps, dane.status_zawodnika, dane.notatka, dane.dateMeta $dodCol1 $dodCol2 $dodCol3 $dodCol4 $dodCol5 $dodCol6 $dodCol7 $dodCol8 $dodCol9 $dodCol10 $dodCol11 from dane WHERE nr_zawodnika!=0 $whereCat $whereClas $whereClub $whereCountry $whereSex $numberRuner1 ORDER BY $firstOrder $firstBy , $secondOrder $secondBy";
    if($resultat1 = mysqli_query($conn1,$ask1)){
        if(mysqli_num_rows($resultat1)){
            echo("<table><tr><th>Edytuj</th><th>Lp.</th>");
           $counter1=1;
           while($counter1<count($thTables)){
                    echo("<th>".$thTables[$counter1][0]."</th>");
                    $counter1++;
           } 
           echo("</tr>");
           $counter2=1;
           while($row1 = mysqli_fetch_array($resultat1)){
                $counter = 0;
                echo("<tr>");
                echo("<form action='editUser.php' method='POST'>");
                echo("<td><input type='submit' value='Edytuj'></td>");
                echo("<td>$counter2</td>");
                while($counter<mysqli_num_fields($resultat1)){
                    echo("<td>$row1[$counter]</td>");
                    if($counter==0){
                        echo("<input type='text' hidden value='$row1[$counter]' name='nrZaw'>");
                    }
                    if($counter==1){
                        echo("<input type='text' hidden value='$row1[$counter]' name='nrChip'>");
                    }
                    $counter++;
                }
                $counter2++;
                echo("</form>");
                echo("</tr>");
            }   
            echo("</table>");
        }
        else{
            echo("Brak wyników wyszukiwań. Sprawdź poprawność zaznaczonych/wpisanych danych.");
        }
    }
?>
<?php
include("footer.php");
?>