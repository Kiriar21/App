<?php
    include("header.php");
?>
<main>
    <div class='main'>
    <div class='main_left'>    
</div>
<div class='main_right'>
    <h1 style='color: #BC2431 ;'>Kreator nowej imprezy</h1><br>
    <h3 style='color: #202E3D'>Pamiętaj aby przed rozpoczęciem przygotować plik .txt z danymi użytkownika zgodnie z instrukcją.</h3><br><br>
    <form action="createDB.php" method="POST">
        <input id='main_submit' type="submit" value='Zacznij'>
    </form>
</div>
<?php
    include("footer.php");
?>