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
    <h1 class="rainbow">Vlucht Inplannen</h1>
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

<main class="main">



</main>
</body>
</html>