<?php
include("header.php");
include("connect.php"); 
include("nameTH.php");
$ask4="SELECT dane.dodCol1, dane.dodCol2, dane.dodCol3, dane.dodCol4,dane.dodCol5,dane.dodCol6,dane.dodCol7,dane.dodCol8,dane.dodCol9, dane.dodCol10, dane.dodCol11  FROM `dane` where nr_zawodnika=0;";
if($res = mysqli_query($conn1,$ask4)){
    if(mysqli_num_rows($res)){
        while($row = mysqli_fetch_array($res)){
            $counter=1;
            while($counter<12){
                if($row[$counter-1]!="" || $row[$counter-1]!=" "){
                    setcookie('dodCol'.$counter, $row[$counter-1], time()+60 * 60 * 24 * 30, "/","", 0);
                }
                $counter++;
            }
        }
    }
}
?>
<?php
   include("navigationMenu.php");
?>
<?php
   $ask='SELECT * from tytul';
   if($res=mysqli_query($conn1,$ask)){
      if(mysqli_num_rows($res)){
         while($row=mysqli_fetch_array($res)){
            echo("Impreza: $row[1] Data: $row[2], $row[3]<br><br><br>");
         }
      }
   }
   $ask2='SELECT count(*) FROM `dane` WHERE nr_zawodnika!=0 AND status_zawodnika="Udział" ';
   if($res2=mysqli_query($conn1,$ask2)){
      if(mysqli_num_rows($res2)){
         while($row2=mysqli_fetch_array($res2)){
            echo("Liczba osób biorących udział w dzisiejszej imprezie: $row2[0]<br><br><br>");
         }
      }
   }   
   $ask1='SELECT * from klasyfikacje';
   if($res1=mysqli_query($conn1,$ask1)){
      if(mysqli_num_rows($res1)){
         echo("<table><tr>");
         echo("<th>Klasyfikacja</th><th>Nazwa</th><th>Godzina startu</th><th>Liczba Kobiet</th><th>Liczba Mężczyzn</th><th>Łącznie osób w biegu:</th></tr>");
         while($row1=mysqli_fetch_array($res1)){
            echo("<tr>");
            echo("<td>$row1[1]</td><td>$row1[2]</td><td>$row1[4]</td>");
            $sex= array("K","M");  
            $helpMe=0;
            foreach($sex as $gender){ 
               $ask3='SELECT count(*) FROM `dane` WHERE nr_zawodnika!=0 AND klasyfikacja="'.$row1[1].'" AND plec="'.$gender.'" AND status_zawodnika="Udział";';
               if($res3=mysqli_query($conn1,$ask3)){
                  if(mysqli_num_rows($res3)){
                     while($row3=mysqli_fetch_array($res3)){
                        echo("<td>$row3[0]</td>");
                        $helpMe=$helpMe+$row3[0];
                     }
                  }
               }
            }
            echo("<td>$helpMe</td>");
            echo("</tr>");
         }
         echo("</table>");
      }
   }

   ?>

   <p>Statystyki Biegów</p>

   <?php
   $ask1='SELECT * from klasyfikacje';
   if($res1=mysqli_query($conn1,$ask1)){
      if(mysqli_num_rows($res1)){
         echo("<table><tr><th>Klasyfikacja</th><th>Liczba zawodników</th><th>Meta</th><th>Pozostało</th><th>Kobiety</th><th>Meta</th><th>Pozostało</th><th>Mężczyźni</th><th>Meta</th><th>Pozostało</th><th>Status Biegu</th></tr>");
         while($row1=mysqli_fetch_array($res1)){
            $counter=0;
            echo("<tr>");
            echo("<td>$row1[1]</td>");
            $firstValue;
            $ask5="SELECT count(nr_chip) FROM dane WHERE dane.klasyfikacja='$row1[1]' AND dane.status_zawodnika='Udział';";
            if($res5=mysqli_query($conn1,$ask5)){
               if(mysqli_num_rows($res5)){
                  while($row5=mysqli_fetch_array($res5)){
                     echo("<td>$row5[0]</td>");
                     $firstValue=$row5[0];
                  }
               }
            }
            $secondValue;
            $ask2="SELECT count($row1[1]wynik.nr_chip) FROM $row1[1]wynik JOIN dane on $row1[1]wynik.nr_chip=dane.nr_chip WHERE dane.status_zawodnika='Udział'";
            if($res6=mysqli_query($conn1,$ask2)){
               if(mysqli_num_rows($res6)){
                  while($row6=mysqli_fetch_array($res6)){
                     echo("<td>$row6[0]</td>");
                     $secondValue=$row6[0];
                  }
               }
            }
            $value=$firstValue-$secondValue;
            echo("<td>$value</td>");
            if($value==0){
               $counter++;
            }
            $sex=array("K","M");
            
            foreach($sex as $s){
               $firstValue;
               $ask5="SELECT count(nr_chip) FROM dane WHERE dane.klasyfikacja='$row1[1]' AND dane.status_zawodnika='Udział' AND plec='$s';";
               if($res5=mysqli_query($conn1,$ask5)){
                  if(mysqli_num_rows($res5)){
                     while($row5=mysqli_fetch_array($res5)){
                        echo("<td>$row5[0]</td>");
                        $firstValue=$row5[0];
                     }
                  }
               }
               $secondValue;
               $ask2="SELECT count($row1[1]wynik.nr_chip) FROM $row1[1]wynik JOIN dane on $row1[1]wynik.nr_chip=dane.nr_chip WHERE dane.klasyfikacja='$row1[1]' AND dane.status_zawodnika='Udział' AND dane.plec='$s';";
               if($res6=mysqli_query($conn1,$ask2)){
                  if(mysqli_num_rows($res6)){
                     while($row6=mysqli_fetch_array($res6)){
                        echo("<td>$row6[0]</td>");
                        $secondValue=$row6[0];
                     }
                  }
               }
               $value=$firstValue-$secondValue;
               echo("<td>$value</td>");
               if($value==0){
                  $counter++;
               }
            }
            if($counter==3){
               echo("<td>Skończony</td>");
            }
            else{
               echo("<td>Aktywny</td>");
            }
            echo("</tr>");
         }
         echo("</table>");
      }
   }
   
?>
<?php

include("footer.php");
?>