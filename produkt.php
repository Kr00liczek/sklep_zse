<?php
require 'connection.php';

$productId = isset($_GET['id']) ? (int)$_GET['id'] : null;

$query = $conn->prepare("SELECT * FROM produkty WHERE id = ?");
$query->bind_param("i", $productId);
$query->execute();
$result = $query->get_result();



if ($result->num_rows == 0) 
    {die('Produkt nie istnieje.<br><h1><a href="index.html">Powrót</a></h1>');}

$product = $result->fetch_assoc();



if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    include('cart_session.php');
    addToCart($productId, $quantity);
    header('Location: koszyk.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['nazwa']; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1><?php echo $product['nazwa']; ?></h1>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">Strona Główna</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="koszyk.php">Koszyk</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="kontakt.html">Kontakt</a>
                        </li>
        
                        <li class="nav-item">
                            <a class="nav-link" href="onas.html">O nas</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Logowanie</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="https://zse.edu.gdansk.pl/pl" target="_blank">Strona szkoły</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
    </header>
    
    <main>
        <div class="content">
            <img src="<?php echo $product['obraz']; ?>" style="width:40%" class="img-left">
            <p id="opis"><?php echo $product['opis']; ?></p>
            <p id="opis">Cena: <?php echo $product['cena']; ?> PLN</p>
            
            <form method="POST">
                <label for="quantity">Ilość:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1">
                <button type="submit">Dodaj do koszyka</button>
            </form>
        </div>
    </main>
        <footer>&copy;2024 Norbert Kozikowski</footer>
</body>
</html>