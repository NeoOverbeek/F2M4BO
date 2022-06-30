<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `manga`');

// checken of id wel is gestuurd
if( !isset($_GET['id']) ){
    echo "De ID is niet gezet.";
    exit;
}

// checken of het wel een int is
$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "Dit is geen getal!";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `manga` WHERE id=?');
$params = [$id];
$statement->execute($params);
$manga = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Mind Webshop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <script src="js/main.js" defer></script>
</head>

<body class="manga-details">
    <div class="container manga-details" id="js--main">
        <section class="detail-container">
            <article class="manga-info">
                <header>
                    <h2><?php echo $manga['titel'];?></h2>
                    <h3>Volume <?php echo $manga['volume']?></h3>
                </header>
                <figure style="background-image: url(images/<?php echo $manga['foto'];?>)">
                    <em>€ <?php echo $manga['prijs']?></em>
                </figure>
                <p>
                <?php echo $manga['beschrijving']?>
                </p>
                <hr>
                <a class="link-manga" href="index.php">Terug naar het overzicht</a>
            </article>
            <aside class="mangas-sidebar">
                <h3>Andere manga</h3>
                <ul>
                <?php foreach($result as $row): ?>
                    <li><?php echo $row['titel'];?></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
        </section>
    </div>
</body>



</html>