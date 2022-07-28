<?php
include("header.php");
include("connect.php");
$ask="SELECT * from klasyfikacje";
    if($resultat = mysqli_query($conn1,$ask)){
        if(mysqli_num_rows($resultat)){
            while($row = mysqli_fetch_array($resultat)){
                if(isset($_POST["file".$row[1]])){
                    $file= $_POST["file".$row[1]];
                    setcookie('file'.$row[1], $file, time()+60 * 60 * 24 * 30, "/","", 0);
                   } 
            }
        }
    }
              
?>
<?php
   include("navigationMenu.php");
?>
<?php
    $ask1="SELECT * from klasyfikacje";
    if($resultat1 = mysqli_query($conn1,$ask1)){
        if(mysqli_num_rows($resultat1)){
            while($row1 = mysqli_fetch_array($resultat1)){
                if(isset($_POST["file".$row1[1]]) && $_POST["file".$row1[1]]!=""){
                    $name=$_POST["file".$row1[1]];
                    $ask3='LOAD DATA INFILE "C:/Users/puste/Downloads/'.$name.'" IGNORE INTO TABLE '.$row1[1].'meta CHARACTER SET "cp1250" FIELDS TERMINATED BY ",";';
                    mysqli_query($conn1,$ask3);
                }
            }
        }
    }
    echo("Zmiany zapisano poprawnie");
?>
<form action="information.php">
<br><br>
<input type="submit" value="Powrót">
</form>
<?php
include("footer.php");
?>
