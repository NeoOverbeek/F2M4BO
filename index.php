<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `manga` ORDER BY `manga`.`titel` ASC');

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

<header>
    <nav class="navigation">
        <h1 class="title">MANGA MIND</h1>
        <button id="js--home-button" class="home_button">Home</button>
        <button id="js--shop-button" class="shop_button">Shop</button>
        <a href="contact.php" class="contact_button">Contact</a>
    </nav>
</header>

<body>
    <main class="home-main" id="js--main">
        <h3 class="big-title">Beste online manga store in Nederland!</h3>
        <article id="js--featured" class="featured-background">
            <h2 class="title--featured">Featured</h2>
            <ul class="featured--tab">
                <!--first shown features-->
                <figure class="featured--figure">
                    <img class="berserk-banner featured" src="images/berserk.webp" alt="Berserk manga">
                    <p class="featured_sale" ><span>€18,00</span> -> €13,00!</p>
                    <a class="info-page" href="details.php?id=2">More Info</a>
                </figure>
                <figure class="featured--figure">
                    <img class="vagebond-banner featured" src="images/onepunchman.webp" alt="One Punch Man manga">
                    <p class="featured_sale" ><span>€20,00</span> -> €15,00!</p>
                    <a class="info-page" href="details.php?id=5">More Info</a>
                </figure>
                <figure class="featured--figure">
                    <img class="jjk-banner featured" src="images/jujutsu.webp" alt="Jujutsu Kaisen manga">
                    <p class="featured_sale" ><span>€23,00</span> -> €14,00!</p>
                    <a class="info-page" href="details.php?id=1">More Info</a>
                </figure>
                <figure class="featured--figure">
                    <img class="berserk-banner featured" src="images/chainsawman.webp" alt="Chainsawman manga">
                    <p class="featured_sale" ><span>€17,50</span> -> €15,00!</p>
                    <a class="info-page" href="details.php?id=4">More Info</a>
                </figure>
            </ul>
        </article>
        <h2 class="title--featured title--featured_spotlight">Spotlight</h2>
        <article class="manga-spotlight">
            <img class="manga-spotlight_image" src="images/chainsawman.webp" alt="Chainsaw man deel 1 in het spotlight">
            <p class="manga-spotlight_description">Denji is a young man trapped in poverty, working off his deceased father's debt to the yakuza by working as a Devil Hunter, aided by Pochita, his canine companion and Chainsaw Devil. Denji is betrayed by the Yakuza, who kill him for a contract
                with the Zombie Devil. Pochita makes a contract with Denji, merging with him and reviving him as a human-devil Hybrid, under the condition that Denji shows his dreams to Pochita. Denji massacres the yakuza, and is approached by a team
                of governmental Devil Hunters, the Public Safety Division, led by Makima, who persuades him to join their ranks. Agreeing, Denji is partnered with Power, the Blood Fiend, and Aki Hayakawa, a self-destructive Devil Hunter. Makima promises
                Denji any favor, provided he kill the Gun Devil, perpetrator of the greatest massacre in human history.</p>
        </article>

    </main>
    <main class="main-shop" id="js--shop">
        <h2 class="title--featured">Filters</h2>
        <section class="inputs">
            <div>
                <input id="checkbox-dark_fantasy" type="checkbox" class="filter">
                <label for="checkbox-dark_fantasy" class="label">Dark Fantasy</label>
            </div>
            <div>
                <input id="checkbox-comedy" type="checkbox" class="filter">
                <label for="checkbox-comedy" class="label">Comedy</label>
            </div>
            <div>
                <input id="checkbox-supernatural" type="checkbox" class="filter">
                <label for="checkbox-supernatural" class="label">Supernatural</label>
            </div>
            <div>
                <input id="checkbox-psychological_drama" type="checkbox" class="filter">
                <label for="checkbox-psychological_drama" class="label">Psychological Drama</label>
            </div>

        </section>
        <ul class="mangas">
        <?php foreach($result as $row): ?>
            <li class="manga_container" data-catagory="<?php echo $row['category']; ?>">
                <img class="manga" src="images/<?php echo $row['foto']; ?>" alt="">
                <p class="manga_prijs"><?php echo $row['titel']?> - €<?php echo $row['prijs']?></p>
                <a class="info-page" href="details.php?id=<?php echo $row['id']?>">More Info</a>
            </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>
        <h3 class="footer_text">Social Media</h3>
        <h3 class="footer_text">FAQ</h3>
    </footer>

</body>



</html>