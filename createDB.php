<?php
include("header.php");
?>
   <main>
    <h4 class='step'>Krok 1: Tworzenie bazy danych imprezy. Zgodnie z instrukcją wypełniaj każdy formularz.</h2> 
    <form  id='createDB'  action="createCookie.php" method="POST" autocomplete="off" onsubmit="return validateForm()" >
       <p class='input_title'>Skrócona nazwa imprezy</p>
        <p style='color: grey; font-weight: 100;'>- jedno słowo<br>- małe litery<br>- bez polskich znaków<br>- np. dla 'UltraRun Maraton HiperUltra 2022' nadaj skrótową nazwę 'ultrarun'</p>
        <input class='input' type="text" id="nameDB" name="nameDB" placeholder='nazwa'></br></br> 
        <p class='input_title'>Tytuł imprezy</p>
        <input class='input' type="text" id="titleEvent" name="titleEvent" placeholder='tytuł'><br><br> 
        <p class='input_title'>Miejscowość</p>   
        <input class='input' type="text" id="cityEvent" name="cityEvent" placeholder='miejscowość'><br><br><br> 
        <input class='submit_button' type="submit" value='potwierdź dane' onClick="f('addInfo.php')">
    </form>
    <script src='validateFormDB.js'></script>
<?php
include("footer.php");
?>