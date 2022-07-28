<?php
include("header.php");
include("connect.php");
include("nameTH.php");
?>


  <p>Na pewno chcesz skończyć bieg? Po wciśnięciu przycisku nie będziesz mógł wrócić do imprezy.</p>
 
    <form action="finishSite.php" method="post" onsubmit="return checkAnswer()">
        Usuń dane
        <input type="submit" value="Usuń">
    </form>
    <form action="information.php" method="post">
        Powrót    
    <input type="submit" value="Powrót">
    </form>

<script>
    function checkAnswer(){
        var a = Math.floor(Math.random()*10+1);
        var b = Math.floor(Math.random()*10+1);
        var c = a + b;
        var odpowiedz = prompt("Próbujesz usunąć bieg. Dla pewności, czy nie wciskasz tego pochopnie/przez przypadek podaj jaki jest wynik działania: "+a+" + "+b);
        if(odpowiedz==c){
            alert("Poprawnie udzielono odpowiedzi.");
            return true;
        }
        else{
            alert("Blednie udzielono odpowiedzi.");
            return false;
        }
    }
</script>
<?php
include("footer.php");
?>