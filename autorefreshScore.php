<?php
include("header.php");
include("connect.php");
?>  

<form action="" method="POST" onsubmit="return autoref()">
    <?php
          $ask1="SELECT * from klasyfikacje";
          if($resultat1 = mysqli_query($conn1,$ask1)){
              if(mysqli_num_rows($resultat1)){
                  while($row1 = mysqli_fetch_array($resultat1)){
                      if(isset($_COOKIE["file".$row1[1]]) && $_COOKIE["file".$row1[1]]!=""){
                          $ask3='LOAD DATA INFILE "C:/Users/Kiriar/Downloads/'.$_COOKIE['file'.$row1[1]].'" IGNORE INTO TABLE '.$row1[1].'meta CHARACTER SET "cp1250" FIELDS TERMINATED BY ",";';
                          mysqli_query($conn1,$ask3);
                        }
                    } 
                }
            }
            $ask1="SELECT * from klasyfikacje";
            if($res=mysqli_query($conn1,$ask1)){
                if(mysqli_num_rows($res)){
                    while($row=mysqli_fetch_array($res)){
                        $ask4="TRUNCATE $row[1]wynik ";
                        mysqli_query($conn1,$ask4);
                        $ask3="SELECT dane.nr_chip, dane.dateMeta, $row[1]meta.czas_meta ,dane.dateMeta, tytul.data FROM `dane` JOIN $row[1]meta ON dane.nr_chip=$row[1]meta.nr_chip JOIN klasyfikacje JOIN tytul WHERE nr_zawodnika!=0 AND klasyfikacja='$row[1]' AND klasyfikacje.impulsMeta='$row[3]' AND $row[1]meta.impuls='$row[3]' GROUP BY dane.nr_zawodnika;";
                        if($resultat2 = mysqli_query($conn1,$ask3)){
                            if(mysqli_num_rows($resultat2)){
                                while($row2 = mysqli_fetch_array($resultat2)){
                                    $date1=date_create($row2[4]." ".$row[4]);
                                    $date2=date_create($row2[3]." ".$row2[2]);
                                    $diff=date_diff($date1,$date2,1);
                                    $date1 = $diff->format("%H:%I:%S.%r%f");
                                    $ask2="INSERT INTO `$row[1]wynik` VALUES (NULL, '$row2[0]', '$date1');";
                                    mysqli_query($conn1,$ask2);
                                }
                            }
                        }
                    }
                }
            }        
                  
    ?>
</form>
<div id="progressBar"></div>
<progress id='prbar' value='0' max='29'></progress>

<script>
    function autoref(){
        var meta = document.createElement('meta');
        meta.httpEquiv = "refresh";
        meta.content = '30';
        document.getElementsByTagName('head')[0].appendChild(meta);
        return true;
    };    
    setInterval(autoref(),1);
    
</script>
<script>
var prBar=1;
var timeleft = 30;
var downloadTimer = setInterval(function(){
var now=1;
var distance=timeleft-now;
  document.getElementById("progressBar").innerHTML = "Do odświeżenia wyników pozostało: " + distance + "s";
  document.getElementById("prbar").value=prBar;
  prBar++;
  timeleft -= 1;
}, 1000);
</script>


<?php
include("footer.php");
?>  


