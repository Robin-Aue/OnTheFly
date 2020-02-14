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
    <h1 class="rainbow">Vlucht Toevoegen</h1>
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
    <p>Vliegtuignummer(automatisch ingevoerd):</p><br/>
    <p>Type:</p><input type="Text" name="type"/><br/>
    <p>Vliegtuigmaatschappij:</p><input type="Text" name="vliegtuigmaatschappij"/><br/>
    <p>Status:</p><input type="Text" name="status"/><br/>
    <input type="submit" name="btnVerstuur" value="Submit"/>
</form>

<?php
if (isset($_POST["btnVerstuur"])) {

    $lijst = array();

    if (empty($_POST["vliegtuignummer"])) {
        echo "Er is geen vliegtuignummer ingevuld!" . "<br/>";
    } else {
        echo "vliegtuignummer: " . $_POST["vliegtuignummer"] . "<br/>";

        $lijst[0] = $_POST["vliegtuignummer"];
    }
    echo "<br>";
    if (empty($_POST["type"])) {
        echo "Er is geen type ingevuld!" . "<br/>";
    } else {
        echo "type: " . $_POST["type"] . "<br/>";

        $lijst[1] = $_POST["type"];
    }
    echo "<br>";
    if (empty($_POST["vliegtuigmaatschappij"])) {
        echo "Er is geen vliegtuigmaatschappij ingevuld!" . "<br/>";
    } else {
        echo "vliegtuigmaatschappij: " . $_POST["vliegtuigmaatschappij"] . "<br/>";

        $lijst[2] = $_POST["vliegtuigmaatschappij"];
    }
    echo "<br>";
    if (empty($_POST["status"])) {
        echo "Er is geen status ingevuld!" . "<br/>";
    } else {
        echo "status: " . $_POST["status"] . "<br/>";

        $lijst[3] = $_POST["status"];
    }
    echo "<br>";

    $query = "INSERT INTO vliegtuigen VALUES ".
        "('$lijst[0]','$lijst[1]','$lijst[2]','$lijst[3]')";


    $stm = $conn->prepare($query);
    if($stm->execute())
    {
        echo "correct uitgevoerd zit in db!";
    }else echo "query in db mislukt!";

}
?>
</body>
</html>