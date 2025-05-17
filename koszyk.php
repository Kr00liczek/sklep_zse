<?php
session_start();

if (!isset($_SESSION['cart'])) 
    {$_SESSION['cart'] = [];}



function getCartTotal() 
{
    $total = 0;
    foreach ($_SESSION['cart'] as $item) 
        {$total += $item['price'] * $item['quantity'];}
        return $total;
}



if (isset($_GET['remove'])) 
{
    $index = (int)$_GET['remove'];
    if (isset($_SESSION['cart'][$index])) 
    {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>Twój koszyk</h1>
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
                            <b><a class="nav-link active" href="#">Koszyk</a></b>
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
        <h2>Zawartość koszyka</h2>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Twój koszyk jest pusty.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <li>
                        <?php echo $item['name']; ?> - <?php echo $item['price']; ?> PLN 
                        (x<?php echo $item['quantity']; ?> = <?php echo $item['price'] * $item['quantity']; ?> PLN)
                        <a href="koszyk.php?remove=<?php echo $index; ?>" id="a">Usuń</a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h4><strong>Łączna cena: <?php echo getCartTotal(); ?> PLN</strong></h4>
            <p>W tym VAT 23%: <?php echo number_format((float)getCartTotal()*0.23,2); ?> PLN</p>
            <a href="checkout.php" id="a">Przejdź do płatności</a>
        <?php endif; ?>
    </main>
    <footer>&copy;2024 Norbert Kozikowski</footer>
</body>
</html>
