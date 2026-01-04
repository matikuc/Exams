<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">

</head>
<body>
    <header id="baner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </header>
    <header id="baner2">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </header>
    <main id="lista1">
        <h3>Polecamy</h3>
        <?php
        $connect = mysqli_connect('localhost','root','','baza3') or die;
        $query = "SELECT `id`,`nazwa`,`opis`,`zdjecie` from `produkty` WHERE `id` IN (18, 22, 23,25);";
        $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($result)){
            echo "<div class ='film'>";
            echo "<h4>$row[0] $row[1]</h4>";
            echo "<img src='$row[3]' alt='film' />";
            echo "<p>$row[2]</p>";
            echo "</div>";
        }
        
        ?>
    </main>
    <main id="lista2">
        <h3>Filmy fantastyczne</h3>
         <?php
        $query2 = "SELECT `id`,`nazwa`,`opis`,`zdjecie` from `produkty` WHERE `produkty`.`Rodzaje_id` = 12; ";
        $result2 = mysqli_query($connect,$query2);
        while($row = mysqli_fetch_array($result2)){
            echo "<div class ='film'>";
            echo "<h4>$row[0] $row[1]</h4>";
            echo "<img src='$row[3]' alt='film' />";
            echo "<p>$row[2]</p>";
            echo "</div>";
        }
        
        ?>
    </main>
    <footer>
        <form action="video.php" method="post">
            <label for="usun">Usuń film nr.:</label>
            <input type="number" name="usun" id="usun">
            <button>Usuń film</button>

        </form>
        <?php
        if(!empty($_POST['usun'])){
            $nr = $_POST['usun'];
            $query3 = "DELETE FROM `produkty` WHERE `id` = $nr;";
            $result3 = mysqli_query($connect,$query3);
        }
        
        ?>
        Stronę wykonał: <a href="mailto:ja@poczta.com">XXXXXXXXXXXXXX</a>
    </footer>

    <?php
    mysqli_close($connect);
    ?>
</body>
</html>