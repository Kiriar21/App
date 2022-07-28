<?php
 $thTables = array(
    array("",""), 
    array("Numer&nbsp;Zawodnika","nr_zawodnika"), 
    array("Numer&nbsp;Chip","nr_chip"),
    array("Klasyfikacja","klasyfikacja"),    
    array("Kategoria","kategoria"),  
    array("Imie","imie"), 
    array("Nazwisko","nazwisko"),    
    array("Płeć","plec"),   
    array("Wiek","wiek"),  
    array("Data&nbsp;Urodzenia","data_ur"), 
    array("Państwo","panstwo"), 
    array("Miasto","miasto"),  
    array("Nazwa&nbsp;klubu","nazwa_klubu"),  
    array("Email","email"),   
    array("Telefon","tel"),   
    array("Telefon&nbsp;ICE","tel_ice"),   
    array("Anonimowy","anonimowy"), 
    array("Kwota&nbsp;Przelewu","kwota_przelew"),    
    array("Kwota&nbsp;Start","kwota_start"), 
    array("Kwota&nbsp;Sklep","kwota_sklep"),  
    array("Kwota&nbsp;Ubezpieczenia","kwota_ubezp"),   
    array("Data&nbsp;Przelewu","data_przelew"),   
    array("Numer&nbsp;Transakcji","nr_transakcji"),   
    array("Status&nbsp;Opłaty","status_oplaty"),  
    array("Data&nbsp;Rejestracji","data_rejestracji"),  
    array("Numer&nbsp;GPS","nr_gps"), 
    array("Status&nbsp;Zawodnika","status_zawodnika"), 
    array("Notatka","notatka"),
    array("Data&nbsp;Meta","dateMeta"),
);
if(isset($_COOKIE['dodCol1'])){
    $thTables[]=array($_COOKIE['dodCol1'],"dodCol1");
}

if(isset($_COOKIE['dodCol2'])){
    $thTables[]=array($_COOKIE['dodCol2'],"dodCol2");
}

if(isset($_COOKIE['dodCol3'])){
    $thTables[]=array($_COOKIE['dodCol3'],"dodCol3");
}

if(isset($_COOKIE['dodCol4'])){
    $thTables[]=array($_COOKIE['dodCol4'],"dodCol4");
}

if(isset($_COOKIE['dodCol5'])){
    $thTables[]=array($_COOKIE['dodCol5'],"dodCol5");
}

if(isset($_COOKIE['dodCol6'])){
    $thTables[]=array($_COOKIE['dodCol6'],"dodCol6");
}

if(isset($_COOKIE['dodCol7'])){
    $thTables[]=array($_COOKIE['dodCol7'],"dodCol7");
}

if(isset($_COOKIE['dodCol8'])){
    $thTables[]=array($_COOKIE['dodCol8'],"dodCol8");
}

if(isset($_COOKIE['dodCol9'])){
    $thTables[]=array($_COOKIE['dodCol9'],"dodCol9");
}

if(isset($_COOKIE['dodCol10'])){
    $thTables[]=array($_COOKIE['dodCol10'],"dodCol10");
}

if(isset($_COOKIE['dodCol11'])){
    $thTables[]=array($_COOKIE['dodCol11'],"dodCol11");
}

?>