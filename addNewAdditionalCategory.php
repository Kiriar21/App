<?php
include("header.php");
include("connect.php"); 
include("nameTH.php");

?>
<?php
      $ask="SELECT dane.dodCol1, dane.dodCol2, dane.dodCol3, dane.dodCol4,dane.dodCol5,dane.dodCol6,dane.dodCol7,dane.dodCol8,dane.dodCol9, dane.dodCol10, dane.dodCol11  FROM `dane` where nr_zawodnika=0; ";
      if($res=mysqli_query($conn1,$ask)){
        if(mysqli_num_rows($res)){
            while($row = mysqli_fetch_array($res)){
                $counter=1;
                while($counter<mysqli_num_fields($res)){
                    if(isset($_POST['dodCol'.$counter])){
                        $name=$_POST['dodCol'.$counter];
                        $ask="UPDATE `dane` SET `dodCol$counter`='$name' WHERE nr_zawodnika=0;";
                        mysqli_query($conn1,$ask);
                    }
                    $counter++;
                }
            }
        }
      }

    echo("Pomyślnie zapisano zmiany.<br>");

?>
<form action="information.php" method="post">
    
    <input type="submit" value="Powrót">
</form>
<?php

include("footer.php");
?>