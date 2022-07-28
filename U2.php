<?php
include("header.php");
include("connect.php");
if(isset($_POST['nmMeta'])){
    $nmMeta1 = $_POST['nmMeta'];
    $nmMeta_expolode = explode('|',$nmMeta1);
    $id=$nmMeta_expolode[0];
    $nmMeta=$nmMeta_expolode[1];
    $imp=$nmMeta_expolode[2];
    $tim=$nmMeta_expolode[3];
    $titl=$nmMeta_expolode[4];
    setcookie('nmMeta', $nmMeta, time()+60 * 60 * 24 * 30, "/","", 0);
    setcookie('imp', $imp, time()+60 * 60 * 24 * 30, "/","", 0);
    setcookie('tim', $tim, time()+60 * 60 * 24 * 30, "/","", 0);
    setcookie('titl', $titl, time()+60 * 60 * 24 * 30, "/","", 0);
   } 
?>

<!-- Do zrobienia ładny desing dla ludzi -->
<form action="U3.php" method="POST">
<input type="submit" value="Wyniki ogólne">
</form>
<form action="U4.php" method="POST">
<input type="submit" value="Wynik w klasyfikacji">
</form>
<form action="U5.php" method="POST">
<input type="submit" value="Wynik dodatkowych Kategorii">
</form>
<form action="U1.php" method="post">
    <input type="submit" value="Wybór Klasyfikacji">
</form>
<?php
include("footer.php");
?>