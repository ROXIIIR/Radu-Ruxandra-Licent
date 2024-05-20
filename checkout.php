<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Checkout</h1>
        <form action="checkout.php" method="post">
            <div class="form-group">
                <label for="nume">Nume:</label>
                <input type="text" class="form-control" id="nume" name="nume" required>
            </div>
            <div class="form-group">
                <label for="prenume">Prenume:</label>
                <input type="text" class="form-control" id="prenume" name="prenume" required>
            </div>
            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="tel" class="form-control" id="telefon" name="telefon" required>
            </div>
            <div class="form-group">
                <label for="numeprodus">Nume Produs:</label>
                <input type="text" class="form-control" id="numeprodus" name="numeprodus" required>
            </div>
            <div class="form-group">
                <label for="numarproduse">Numar Produse:</label>
                <input type="number" class="form-control" id="numarproduse" name="numarproduse" required>
            </div>
            <button type="submit" class="btn btn-primary">Trimite Comanda</button>
        </form>

        <?php
        // Conectare la baza de date
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "comenzi";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verifică conexiunea
        if ($conn->connect_error) {
            die("<div class='alert alert-danger mt-3'>Conexiune esuata: " . $conn->connect_error . "</div>");
        }

        // Verifică dacă formularul a fost trimis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifică dacă toate câmpurile sunt completate
            if (isset($_POST["nume"], $_POST["prenume"], $_POST["telefon"], $_POST["numeprodus"], $_POST["numarproduse"])) {
                // Preiați datele din formular
                $nume = $_POST["nume"];
                $prenume = $_POST["prenume"];
                $telefon = $_POST["telefon"];
                $numeprodus = $_POST["numeprodus"];
                $numarproduse = $_POST["numarproduse"];

                // Inserează datele în baza de date
                $sql = "INSERT INTO comenzi (nume, prenume, telefon, numeprodus, numarproduse) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $nume, $prenume, $telefon, $numeprodus, $numarproduse);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Comanda a fost plasată cu succes!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Eroare la plasarea comenzii: " . $stmt->error . "</div>";
                }

                $stmt->close();
            } else {
                echo "<div class='alert alert-warning mt-3'>Datele trimise prin formular nu sunt complete.</div>";
            }
        }

        // Închideți conexiunea la baza de date
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS, jQuery și Popper.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
