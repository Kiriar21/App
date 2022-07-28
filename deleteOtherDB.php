<?php
$dbhost='localhost';
$dbuser='root';
$dbpasswd='';
$conn = mysqli_connect($dbhost,$dbuser,$dbpasswd);
if ($conn -> connect_errno){
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}   
else{
    $ask0="SHOW DATABASES;";
    if($result = mysqli_query($conn,$ask0)){
        if(mysqli_num_rows($result)){
            while($row=mysqli_fetch_array($result))
            {
                if($row[0]=="information_schema" || $row[0]=="mysql" || $row[0]=="name" || $row[0]=="performance_schema" || $row[0]=="phpmyadmin"){
                    continue;
                }
                else{
                    $ask0="DROP DATABASE if exists $row[0]";
                    if(mysqli_query($conn,$ask0)){
                        echo("Usunieto baze danych: ".$row[0]."<br>");
                    }
                    else{
                        echo("Blad podczas usuwania bazy danych:". $row[0] ."<br>");
                    }
                }
            }
        }
    }
    echo("Usuwanie zakończone.");
}
?>
<form action="main.php">
    <input type="submit" value="Powrót do kreatora" >
</form>
<?php
include("footer.php");
?>