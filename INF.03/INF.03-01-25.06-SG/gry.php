<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section id="lewa">
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'gry');
            $query = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<li>{$row['0']} <mark class='punkty'>{$row['1']}</mark></li>";
            }
            ?>
        </ul>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonał</h3>
        <p>XXXXXXXXXXXX</p>
    </section>
    <section id="srodek">
<?php
$connect = mysqli_connect('localhost', 'root', '', 'gry');
$query2 = "SELECT id, nazwa, zdjecie FROM gry;";
$result2 = mysqli_query($connect, $query2);
while ($row2 = mysqli_fetch_array($result2)) {
    echo "<div class='gra'>";
    echo "<img src='{$row2['2']}' alt='{$row2['0']}'><br>";
    echo "{$row2['1']}<br><br>";
    echo "</div>";
}
    ?>



    </section>
    <section id="prawa">
        <h3>Dodaj nową grę</h3>
        <form action="gry.php" method="post">
            <label for="nazwa">Nazwa</label><br>
            <input type="text" id="nazwa" name="nazwa" ><br>
            <label for="opis">Opis</label><br>
            <input type="text" id="opis" name="opis" ><br>
            <label for="cena">Cena</label><br>
            <input type="text" id="cena" name="cena" ><br>
            <label for="zdjecie">Zdjęcie</label><br><br>
            <input type="text" id="zdjecie" name="zdjecie" ><br>
            <input type="submit" name="dodaj" value="DODAJ"><br>
            
        </form>
    </section>
    <footer>
        <form action="gry.php" method="post">
            
            <input type="text" id="id" name="id" >
            <input type="submit" value="Pokaż opis">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $id = $_POST['id'];
                $connect = mysqli_connect('localhost', 'root', '', 'gry');
                $query3 = "SELECT nazwa, LEFT(opis, 100) AS opis, punkty, cena FROM gry WHERE id = $id;";
                $result3 = mysqli_query($connect, $query3);
                if ($row3 = mysqli_fetch_array($result3)) {
                    echo "<h2>{$row3['0']}, {$row3['2']} punktów, {$row3['3']} zł</h2>";
                    echo "<p>{$row3['opis']}</p>";
                    
                } }
            ?>
        </form>
    </footer>
    <?php
    if (isset($_POST["dodaj"]) && !empty($_POST["nazwa"])){
        $nazwa = $_POST["nazwa"];
        $opis = $_POST["opis"];
        $cena = $_POST["cena"];
        $zdjecie = $_POST["zdjecie"];
        $connect = mysqli_connect('localhost', 'root', '', 'gry');
        $query4 = "INSERT INTO gry (nazwa, opis, cena, zdjecie, punkty)
           VALUES ('$nazwa', '$opis', '$cena', '$zdjecie', 0);";
        mysqli_query($connect, $query4);
        header("location: gry.php");
    }
    mysqli_close($connect);
    ?>
    
</body>
</html>