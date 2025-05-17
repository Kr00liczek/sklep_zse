<?php
session_start();
require 'connection.php';

function getCartTotal() 
{
    $total = 0;
    foreach ($_SESSION['cart'] as $item) 
        {$total += $item['price'] * $item['quantity'];}   
        return $total;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    echo "<p>Dziękujemy za zamówienie, $name! Potwierdzenie zostało wysłane na $email.</p>";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $telefon = $_POST["telefon"];
        $adres = $_POST["adres"];
        $miasto = $_POST["miasto"];
        $kp = $_POST["kp"];
        $suma = getCartTotal();
        $vat = getCartTotal()*0.23;

        $_SESSION['cart'] = [];

        $sql = "INSERT INTO zamowienia (dane_osobowe, email, telefon, adres, miasto, kod_pocztowy, suma_zamowienia, vat_23)
        VALUES ('$name', '$email', '$telefon', '$adres', '$miasto', '$kp', '$suma', $vat)";

            if(!empty($conn))
            {
                if($conn -> query($sql) === TRUE)
                    {echo "Zamówienie złożono pomyślnie!";}
                else
                    {echo "Błąd: ".$sql."<br>". $conn->error;}
            }
    }   
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podsumowanie zamówienia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <h1>Podsumowanie zamówienia</h1>
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
        <h2>Łączna cena: <?php echo getCartTotal(); ?> PLN</h2>
        
        
        <form method="POST" action="checkout.php" id="z">
        <center><h3>Formularz kontaktowy</h3></center><br>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="name" id="name" placeholder="Państwa dane osobowe" required>
        <label for="name">Imię i Nazwisko</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="przykład@skrzynka.pl" required>
        <label for="email">Email</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="telefon" id="telefon" maxlength="11" required placeholder="123456789 lub 123-456-789">
        <label for="telefon">Numer telefonu</label>
    </div>

    <div class="form-row">
        <div class="form-floating mb-3 col">
            <input type="text" class="form-control" name="adres" id="adres" required placeholder="Tam dostarczymy paczkę">
            <label for="adres">Adres</label>
        </div>

        <div class="form-floating mb-3 col">
            <input type="text" class="form-control" name="miasto" id="miasto" required placeholder="W tym mieście">
            <label for="miasto">Miasto</label>
        </div>

        <div class="form-floating mb-3 col">
            <input type="text" class="form-control" name="kp" id="kp" maxlength="6" required placeholder="12-345" oninput="formatPostalCode(this)">
            <label for="kp">Kod pocztowy</label>
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nrk" id="nrk" maxlength="20" required placeholder="1234 1234 1234 1234" oninput="formatWithSpaces(this)">
        <label for="nrk">Numer karty</label>
    </div>

    <div class="form-row">
        <div class="form-floating mb-3 col">
            <input type="text" class="form-control" name="dw" id="dw" required maxlength="7" placeholder="MM / RR" oninput="formatDate(this)">
            <label for="dw">Data ważności</label>
        </div>

        <div class="form-floating mb-3 col">
            <input type="text" class="form-control" name="cvc" id="cvc" maxlength="3" required placeholder="123">
            <label for="cvc">Kod CVC</label>
        </div>
    </div>

    <center><button type="submit">Złóż zamówienie</button></center>
</form>
        
    </main>
    <footer>&copy;2024 Norbert Kozikowski</footer>
</body>
</html>