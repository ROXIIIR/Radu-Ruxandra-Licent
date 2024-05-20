<?php
// Verifica dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifică dacă toate câmpurile au fost completate
    if (isset($_POST['numeprodus']) && isset($_POST['pret']) && isset($_FILES['poza'])) {
        $numeprodus = $_POST['numeprodus'];
        $pret = $_POST['pret'];
        $poza = $_FILES['poza'];

        // Verifică dacă fișierul a fost încărcat cu succes
        if ($poza['error'] === UPLOAD_ERR_OK) {
            // Obține extensia fișierului încărcat
            $extensie = pathinfo($poza['name'], PATHINFO_EXTENSION);
            // Generează un nume unic pentru imagine
            $numeunic = uniqid() . '.' . $extensie;
            // Salvează imaginea în folderul img
            move_uploaded_file($poza['tmp_name'], 'img/' . $numeunic);

            // Mesajul de succes
            echo "Produsul <strong>$numeprodus</strong> a fost adăugat cu prețul de <strong>$pret</strong> lei și imaginea:<br>";
            echo "<img src='img/$numeunic' alt='Imagine produs'>";

        } else {
            echo "Eroare la încărcarea imaginii: " . $poza['error'];
        }
    } else {
        echo "Toate câmpurile trebuie completate!";
    }
}
?>
