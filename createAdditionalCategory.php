<?php
include("header.php");
include("connect.php"); 
include("nameTH.php");

?>
<?php
   include("navigationMenu.php");
?>
<form action="addNewAdditionalCategory.php" method="POST">
<?php
  $ask="SELECT dane.dodCol1, dane.dodCol2, dane.dodCol3, dane.dodCol4,dane.dodCol5,dane.dodCol6,dane.dodCol7,dane.dodCol8,dane.dodCol9, dane.dodCol10, dane.dodCol11  FROM `dane` where nr_zawodnika=0; ";
  if($res=mysqli_query($conn1,$ask)){
    if(mysqli_num_rows($res)){
        while($row = mysqli_fetch_array($res)){
            $counter=0;
            $counter1=1;
            $counter2=1;
            while($counter<mysqli_num_fields($res)){
                if(strstr($row[$counter],"Pliki")!=true && strstr($row[$counter],"pliki")!=true){
                    echo($counter1." Dodakowa Kategoria: <input type='text' value='$row[$counter]' name='dodCol$counter2'><br>");
                    $counter1++;
                }
                $counter++;
                $counter2++;
            }
            
        }
    }
  }
?>
<input type="submit" value="Zapisz zmiany">

</form>
<?php

include("footer.php");
?>