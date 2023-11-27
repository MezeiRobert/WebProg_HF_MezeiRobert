<?php
$correctAnswer = false;

if (isset($_COOKIE["randomNumber"])){
    $randomNumber = $_COOKIE["randomNumber"];
} else {
    $randomNumber = rand(1,100);
    setcookie("randomNumber", $randomNumber, time() + 60 * 60 * 24 * 365, "/");
}

if (isset($_POST["submit"])){
    if (isset($_POST["guess"]) && is_numeric($_POST["guess"])){
        $guess = $_POST["guess"];

        if ($guess == $randomNumber) {
            $correctAnswer = true;
            setcookie("randomNumber", "", time() - 3600);

            $randomNumber = rand(1,100);
            setcookie("randomNumber", $randomNumber, time() + 60 * 60 * 24 * 365, "/");
        } else if ($guess < $randomNumber){
            echo "Tippelt szam kisebb a megadott szamnal";
        } else if ($guess > $randomNumber) {
            echo "Tippelt szam nagyobb a megadott szamnal";
        }
    }
}

if ($correctAnswer){
    echo "Gratulalok eltalaltad a szamot!";
}
?>
<form method="POST" action="">
    <br>Tippelj egy számot (1-100 között):
    <br><input type="number" name="guess" min="1" max="100">
    <input type="submit" name="submit" value="Tippelj">
</form>
