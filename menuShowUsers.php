<?php
include("header.php");
include("connect.php");
?>
<form action="showUsers.php">
Wyświetl wszystkie informację o użytkownikach
<input type="submit" value="Pokaż"> 
</form>


<form action="showUsers2.php">
Wyświetl podstawowę informację o użytkownikach (Numer zawodnika, imie, nazwisko, klasyfikacja, kategoria, miejscowosc, wiek, pliki, dodatkowe Kategorie)
<input type="submit" value="Pokaż"> 
</form>
<?php
include("footer.php");
?>