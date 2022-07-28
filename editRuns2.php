<?php
include("header.php"); 
include("connect.php");

?>
    <?php
      $ask1="SELECT * from klasyfikacje";
      if($resultat1 = mysqli_query($conn1,$ask1)){
          if(mysqli_num_rows($resultat1)){
              while($row1 = mysqli_fetch_array($resultat1)){
                  if(isset($_POST["nameClass".$row1[1]]) && isset($_POST["impuls".$row1[1]]) && isset($_POST["timeS".$row1[1]]) ){
                      $nameClass=$_POST["nameClass".$row1[1]];
                      $impuls=$_POST["impuls".$row1[1]];
                      $timeS=$_POST["timeS".$row1[1]];
                      $ask2="UPDATE `klasyfikacje` SET `tytulKlasyfikacji`='$nameClass' , `impulsMeta` = $impuls, `czas_start` = '$timeS' WHERE id=$row1[0]; ";
                      mysqli_query($conn1,$ask2);
                  }                  
              }
          }
      }  
      echo("Zapisano zmiany poprawnie.");
    ?>
    <form action="information.php" method="POST">
        <br><br>
        <input type="submit" value="Powrót">
    </form>
<?php
include("footer.php");
?>