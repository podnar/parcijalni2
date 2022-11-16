<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARCIJALNI ISPIT2 - osnove PHPa</title>
</head>

<body>

    <div style="width: 50%; float:left;">
        <form action="" method="POST">
            <label for=""> Upišite riječ:</label>
            <br>
            <input type="text" name="word">
            <br>
            <br>
            <input type="submit" value="Pošalji">
        </form>

    </div>


    <div style="width:50%; float:right;">
        <table border="1" cellpadding="10">
            <tr>
                <th>Riječ</th>
                <th>Broj slova</th>
                <th>Broj suglasnika</th>
                <th>Broj samoglasnika</th>
            </tr>

            <?php

            include 'functions.php';

            $wordsJson = file_get_contents(__DIR__ . "/words.json"); #učitava json file
            $letters = json_decode($wordsJson, true); #dekodira json fajl u array $letters
            # var_dump($letters); // testni ispis
            if (empty($_POST)) {
                echo "upišite željenu riječ";
            } elseif (empty($_POST["word"])) {
                echo "polje ne smije biti prazno";
            } elseif (!empty($_POST["word"]) && ctype_alpha($_POST["word"])) {
                echo "upišite željenu riječ";
                $word = $_POST["word"];
                $letters[] = $_POST["word"];
            } else {
                echo "upišite riječ!";
            }

            $wordsJson = json_encode($letters); #enkodiraj u json format
            file_put_contents(__DIR__ . "/words.json", $wordsJson); #zapiši u json fajl

            foreach ($letters as $character) {
                $characterCount = strlen($character);
                $samoglasnikCount = brojacZnakova($character)[0]; #čita return iz funkcije s pozicije 0
                $suglasnikCount = brojacZnakova($character)[1];

                echo '<tr>';
                echo '<td>' . $character . '</td>';
                echo '<td>' . $characterCount . '</td>';
                echo '<td>' . $samoglasnikCount . '</td>';
                echo '<td>' . $suglasnikCount . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>


</body>

</html>