<?php
$host = "localhost";
$dbname = "onthefly";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="vliegtuig1.css"/>
</head>
<body>
<div class="container">
    <h1 class="rainbow">Vlucht Plannen</h1>
</div>
<header class="header sticky sticky--top js-header">

    <div class="grid">

        <nav class="navigation">
            <ul class="navigation__list navigation__list--inline">
                <li class="navigation__item"><a href="vliegtuig.php" class="is-active">Home</a></li>
                <li class="navigation__item"><a href="vliegtuigen.php">Vliegtuigen</a></li>
                <li class="navigation__item"><a href="vliegtuigentoevoegen.php">Inplannen</a></li>
                <li class="navigation__item"><a href="vliegtuigplaning.php">Vliegtuigen toevoegen</a></li>
            </ul>
        </nav>

    </div>

</header>
<form method="post">
    <p>Vluchtnummer(automatisch ingevoerd):</p><br/>
    <p>Vliegtuig:</p><input type="Text" name="vliegtuig"/><br/>
    <p>Vertrekdatum:</p><input type="Text" name="vertrekdatum"/><br/>
    <p>Retourdatum:</p><input type="Text" name="retourdatum"/><br/>
    <p>Bestemming:</p><input type="Text" name="bestemming"/><br/>
    <p>Status:</p><input type="Text" name="status"/><br/>
    <input type="submit" name="btnVerstuur" value="Submit"/>
</form>

<?php
if (isset($_POST["btnVerstuur"])) {

    $lijst = array();

    if (empty($_POST["vluchtnummer"])) {
        echo "Er is geen vluchtnummer ingevuld!" . "<br/>";
    } else {
        echo "vluchtnummer: " . $_POST["vluchtnummer"] . "<br/>";

        $lijst[0] = $_POST["vluchtnummer"];
    }
    echo "<br>";
    if (empty($_POST["vliegtuig"])) {
        echo "Er is geen vliegtuig ingevuld!" . "<br/>";
    } else {
        echo "vliegtuig: " . $_POST["vliegtuig"] . "<br/>";

        $lijst[1] = $_POST["vliegtuig"];
    }
    echo "<br>";
    if (empty($_POST["vertrekdatum"])) {
        echo "Er is geen vertrekdatum ingevuld!" . "<br/>";
    } else {
        echo "vertrekdatum: " . $_POST["vertrekdatum"] . "<br/>";

        $lijst[2] = $_POST["vertrekdatum"];
    }
    echo "<br>";
    if (empty($_POST["retourdatum"])) {
        echo "Er is geen retourdatum ingevuld!" . "<br/>";
    } else {
        echo "retourdatum: " . $_POST["retourdatum"] . "<br/>";

        $lijst[3] = $_POST["retourdatum"];
    }
    echo "<br>";
    if (empty($_POST["bestemming"])) {
        echo "Er is geen bestemming ingevuld!" . "<br/>";
    } else {
        echo "bestemming: " . $_POST["bestemming"] . "<br/>";

        $lijst[4] = $_POST["bestemming"];
    }
    echo "<br>";
    if (empty($_POST["status"])) {
        echo "Er is geen status ingevuld!" . "<br/>";
    } else {
        echo "status: " . $_POST["status"] . "<br/>";

        $lijst[5] = $_POST["status"];
    }
    echo "<br>";

    $query = "INSERT INTO planning VALUES ".
        "('$lijst[0]','$lijst[1]','$lijst[2]','$lijst[3]','$lijst[4]','$lijst[5]')";

    $stm = $conn->prepare($query);
    if($stm->execute())
    {
        echo "correct uitgevoerd zit in db!";
    }else echo "query in db mislukt!";

}
?>
</body>
</html>