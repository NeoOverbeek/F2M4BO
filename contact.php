<?php
require 'functions.php';
$connection = dbConnect();

$voornaam = '';
$achternaam = '';
$email = '';
$bericht = '';

// Opslag variabele array voor errors
$errors = [];


if($_SERVER['REQUEST_METHOD'] == "POST"){

    // Gegevens opslaan
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    $tijdstip = date('Y-m-d H:i:s');

    // Fouten controleren / valideren van input
    if( isEmpty($voornaam) ){
        $errors['voornaam'] = 'Vul uw voornaam in A.U.B.';
    }
    if( isEmpty($achternaam) ){
        $errors['achternaam'] = 'Vul uw achternaam in A.U.B.';
    }
    if( !isValidEmail($email) ){
        $errors['email'] = 'Dit is geen geldig email adres!';
    }
    if( !hasMinLength($bericht, 5)){
        $errors['bericht'] = 'vul minimaal 5 tekens in.';
    }
    if(count($errors) == 0) {
        $sql = "INSERT INTO `berichten` (`voornaam`, `achternaam`, `email`, `bericht`, `tijdstip`)
            VALUES (:voornaam, :achternaam, :email, :bericht, :tijdstip);";

        $statement = $connection->prepare($sql);
        $params = [
            'voornaam' => $voornaam,
            'achternaam' => $achternaam,
            'email' => $email,
            'bericht' => $bericht,
            'tijdstip' => $tijdstip
        ];
        $statement->execute($params);
        
        header('Location: bedankt.html');
        exit;
    }

    

}

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
</head>

<body class="manga-details">
    <div class="container">
        <section class="contact">
            <header>
                <h2 class="contact-header">Heb je een vraag?</h2>
            </header>

            <form action="contact.php" method="POST" novalidate>
                <div class="form__field">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" value="<?php echo $voornaam;?>" id="voornaam" name="voornaam" placeholder="Vul uw naam in" required />

                    <?php if( !empty( $errors['voornaam']) ): ?>
                        <p class="form__error"><?php echo $errors['voornaam'];?></p>
                    <?php endif;?>

                </div>
                <div class="form__field">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" value="<?php echo $achternaam;?>" id="achternaam" name="achternaam" placeholder="Vul uw achternaam in" required />

                    <?php if( !empty( $errors['achternaam']) ): ?>
                        <p class="form__error"><?php echo $errors['achternaam'];?></p>
                    <?php endif;?>
                </div>
                <div class="form__field">
                    <label for="email">E-mail</label>
                    <input type="email" value="<?php echo $email;?>" id="email" name="email" placeholder="Vul uw e-mailadres in" required />

                    <?php if( !empty( $errors['email']) ): ?>
                        <p class="form__error"><?php echo $errors['email'];?></p>
                    <?php endif;?>
                </div>
                <div class="form__field">
                    <label for="bericht">Bericht</label>
                    <textarea name="bericht" id="bericht" placeholder="Vul uw vraag of bericht in" required><?php echo $bericht;?></textarea>

                    <?php if( !empty( $errors['bericht']) ): ?>
                        <p class="form__error"><?php echo $errors['bericht'];?></p>
                    <?php endif;?>
                </div>
                <button type="submit" class="form__button">Opsturen</button>
            </form>
             <hr>
             <a href="index.php">Terug naar shop</a>
        </section>
    </div>
</body>



</html>