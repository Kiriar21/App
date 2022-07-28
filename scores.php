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
<?php
   include("navigationMenu.php");
?>
Wybierz formę wyników jaką chcesz zobaczyć
<form action="scoresSElectMeta.php" method="POST">
<input type="submit" value="Wyniki ogólne">
</form>
<form action="scoresSelectCategory.php" method="POST">
<input type="submit" value="Wynik w klasyfikacji">
</form>
<form action="/additionalCategory.php" method="POST">
<input type="submit" value="Wynik dodatkowych Kategorii">
</form>
<?php
include("footer.php");
?>