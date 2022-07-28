<?php
include("header.php");
include("connect.php");
?>  

<?php
    $nrChip=$_POST['nrChip'];
    $timeZawodnika=$_POST['timeZaw'];
    $nrImpuls=$_POST['nrImpuls'];
    $nmCl = $_POST['nmCl'];
    $nrID=100000;
    $ask1="SELECT dane.nr_chip from dane JOIN ".$nmCl."meta ON dane.nr_chip=".$nmCl."meta.nr_chip WHERE  ".$nmCl."meta.nr_chip=$nrChip AND ".$nmCl."meta.impuls=$nrImpuls ;";
    if($res=mysqli_query($conn1,$ask1)){
        if(mysqli_num_rows($res)){
            echo("Niestety ale użytkownik o podanym numerze chip już widnieje w bazie z podanym numerem impulsu.");
        }
        else{
            $ask0="SELECT ID from ".$nmCl."meta ORDER BY ID DESC LIMIT 1";
            if($res = mysqli_query($conn1,$ask0)){
                if(mysqli_num_rows($res)){
                    while($row = mysqli_fetch_array($res)){
                        if($row[0]>=100000){
                            $nrID=$row[0]+1;
                        }
                    }
                }
            }
            $ask = "INSERT INTO ".$nmCl."meta (`nameCT`, `ID`, `nazwaOdczytu`, `nr_chip`, `czas_meta`, `impuls`, `nazwaPobrania`, `silaSygnalu`) VALUES ('dodanoRecznie','$nrID','dodanoRecznie','$nrChip','$timeZawodnika','$nrImpuls','dodanoRecznie','1'); ";
            if(mysqli_query($conn1,$ask)){
                echo("Dodano informacje o mecie.");
            }
        }
    }
    
?>
<form action="information.php"> <input type="submit" value="Powrót">  </form>
<?php
include("footer.php");
?>  


