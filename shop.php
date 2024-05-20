<!doctype html> <!-- Declară tipul de document HTML -->

<html lang="en"> <!-- Începutul elementului HTML cu specificarea limbii -->

  <head> <!-- Începutul secțiunii head -->
  	<title>DILEMMA SHOP</title> <!-- Titlul paginii web -->
    <meta charset="utf-8"> <!-- Setarea codării caractere în UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Configurarea meta-viewport -->

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'> <!-- Adăugarea fontului Roboto prin Google Fonts -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Adăugarea fontului Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"> <!-- Adăugarea fontului Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> <!-- Adăugarea fontului Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Adăugarea stilurilor Bootstrap -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'> <!-- Adăugarea fontului Roboto din nou -->
	
	<link rel="stylesheet" href="css/style.css"> <!-- Adăugarea fișierului CSS personalizat -->

	</head> <!-- Sfârșitul secțiunii head -->

	<body> <!-- Începutul corpului paginii web -->

		<div id="preloader"> <!-- Div pentru preîncărcare -->
			<div class="preloader-content"> <!-- Conținut pentru preîncărcare -->
				<span></span> <!-- Indicator vizual pentru preîncărcare -->
			</div>
		</div> <!-- Sfârșitul divului pentru preîncărcare -->
		<script> document.addEventListener("DOMContentLoaded", function() { <!-- Script JavaScript pentru gestionarea preîncărcării -->
			// Simularea încărcării paginii (aici puteți înlocui cu codul real pentru a detecta când pagina este complet încărcată)
			setTimeout(function() {
				// Adaugă clasa "loaded" pentru a declanșa animația de glisare
				document.getElementById('preloader').classList.add('loaded');
				// Ascunde preloader-ul după ce animația este completă (după 0.5 secunde, durata tranzitiei)
				setTimeout(function() {
					document.getElementById('preloader').style.display = 'none';
				}, 500);
			}, 3000); // 2 secunde, doar pentru simulare
		});
		</script> <!-- Sfârșitul scriptului pentru preîncărcare -->

		
		<div class="container"> <!-- Container Bootstrap -->
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar"> <!-- Bară de navigare Bootstrap -->
		    <div class="container"> <!-- Container pentru bara de navigare -->
            <img src="img/logo.jpg"alt="DILEMMA" style="width: 150px; height: auto;"> <!-- Imaginea ca Brand-ul site-ului -->
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"> <!-- Butonul pentru meniul mobil -->
		        <span class="fa fa-bars"></span> Menu
		      </button>
		      <div class="collapse navbar-collapse" id="ftco-nav"> <!-- Meniul principal al site-ului -->
		        <ul class="navbar-nav ml-auto mr-md-3"> <!-- Listă pentru elementele de navigare -->
		        	<li class="nav-item "><a href="http://localhost:3000/index.php" class="nav-link">Home</a></li> <!-- Element de navigare - Acasă -->
		        	<li class="nav-item active"><a href="http://localhost:3000/shop.php" class="nav-link">Shop</a></li> <!-- Element de navigare - Magazin -->
		          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li> <!-- Element de navigare - Contact -->
				  <li class="nav-item"><a href="http://localhost:3000/login.php" class="nav-link"><i class="fa fa-user"></i></a></li> <!-- Element de navigare - Utilizator -->

				  <li class="nav-item">
					<a href="#" id="cart-nav-button" class="nav-link">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</li>
				
				
              </li> <!-- Sfârșitul elementului de navigare dropdown -->
		        </ul> <!-- Sfârșitul listei de elemente a meniului -->
		      </div>
		    </div>
		  </nav> <!-- Sfârșitul băii de navigare Bootstrap -->
  </div> <!-- Sfârșitul containerului -->

	
  

 

<br><br><br> <!-- Linii goale pentru spațiere -->


<div class="responsive-container">
    <div class="row">
        <div class="col text-center">
            <h2>PRODUSE</h2><br><br>
        </div>
    </div>
    <div class="grid">
        <?php
        // Conectare la baza de date
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "produse";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifică conexiunea
        if ($conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
        }

        // Interogare pentru a obține produsele
        $sql = "SELECT * FROM produse";
        $result = $conn->query($sql);

        // Afișare produse
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='grid-column'>";
                echo "<a class='product' href='#'>";
                echo "<div class='product-image'>";
                echo "<img src='img/" . $row["imagine"] . "' alt='" . $row["nume"] . "'>";
                echo "</div>";
                echo "<div class='product-content'>";
                echo "<div class='product-info'>";
                echo "<h2 class='product-title'>" . $row["nume"] . "</h2>";
                echo "<p class='product-price'>" . $row["pret"] . "lei</p>";
                echo "</div>";
                echo "<button class='product-action'><i class='fa fa-cart-plus'></i></button>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "Nu există produse de afișat.";
        }

        // Închide conexiunea
        $conn->close();
        ?>
    </div>
</div> <!-- Sfârșitul containerului pentru produse -->


<br><br><br><br> <!-- Linii goale pentru spațiere -->





<div id="cart-popup" class="cart-popup">
    <div class="cart-content">
        <h3>Shopping Cart</h3>
        <ul id="cart-items">
            <!-- Aici vor fi afișate produsele din coș -->
        </ul>
		<a href="http://localhost:3000/checkout.php" class="finalize-button">Finalizează Comanda</a>

        <button id="close-cart">Close</button>
    </div>
</div>



<script>
	
	document.addEventListener("DOMContentLoaded", function() {
            // Eveniment pentru click pe butonul de finalizare a comenzii
            const finalizeButton = document.querySelector('.finalize-button');
            finalizeButton.addEventListener('click', function() {
                // Colectăm informațiile despre produsele din coș
                const cartItems = document.querySelectorAll('#cart-items li');
                const productsData = [];

                cartItems.forEach(item => {
                    const productName = item.textContent.trim();
                    const productQuantity = item.querySelector('input[type="number"]').value;
                    productsData.push({ name: productName, quantity: productQuantity });
                });

                // Serializăm datele și le trimitem către checkout.php folosind metoda POST
                const formData = new FormData();
                formData.append('productsData', JSON.stringify(productsData));

                // Creăm o cerere HTTP
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'checkout.php', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        console.log('Comanda a fost plasată cu succes!');
                        // Poți face și alte acțiuni aici, cum ar fi redirecționarea către o altă pagină
                    } else {
                        console.error('Eroare la plasarea comenzii: ' + xhr.statusText);
                    }
                };
                xhr.send(formData);
            });
        });
</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll('.product-action .fa-cart-plus');
    const cartPopup = document.getElementById('cart-popup');
    const cartItemsList = document.getElementById('cart-items');
    const closeCartButton = document.getElementById('close-cart');
    const cartNavButton = document.getElementById('cart-nav-button');

    // Funcție pentru adăugarea unui produs în coș și afișarea lui în pop-up
    function addToCart(productTitle) {
        const li = document.createElement('li');
        li.textContent = productTitle;
        
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Șterge';
        deleteButton.classList.add('delete-button');
        deleteButton.addEventListener('click', function() {
            li.remove();
        });
        
        const quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.value = 1;
        quantityInput.min = 1;

        const increaseButton = document.createElement('button');
        increaseButton.textContent = '+';
        increaseButton.addEventListener('click', function() {
            quantityInput.value++;
        });

        const decreaseButton = document.createElement('button');
        decreaseButton.textContent = '-';
        decreaseButton.addEventListener('click', function() {
            if (quantityInput.value > 1) {
                quantityInput.value--;
            }
        });

        li.appendChild(deleteButton);
        li.appendChild(decreaseButton);
        li.appendChild(quantityInput);
        li.appendChild(increaseButton);
        
        cartItemsList.appendChild(li);
        cartPopup.classList.add('show');
    }

    // Eveniment pentru click pe butoanele de adăugare în coș
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productTitle = this.parentElement.parentElement.querySelector('.product-title').textContent;
            addToCart(productTitle);
        });
    });

    // Eveniment pentru deschiderea pop-up-ului coșului când este apăsat butonul din bara de navigare
    cartNavButton.addEventListener('click', function() {
        cartPopup.classList.toggle('show');
    });

    // Eveniment pentru închiderea pop-up-ului coșului
    closeCartButton.addEventListener('click', function() {
        cartPopup.classList.remove('show');
    });
});



</script>









<!-- Script pentru interactivitatea sectiunii BEST SELLER -->
<script>  
	document.getElementById('range-picker').addEventListener('click', function(e) {
  var sizeList = document.getElementById('range-picker').children;
  for (var i = 0; i <= sizeList.length - 1; i++) {
    console.log(sizeList[i].classList);
    if (sizeList[i].classList.contains('active')) {
      sizeList[i].classList.remove('active');
    }
  }
  e.target.classList.add('active');
})

document.getElementById('color-a').addEventListener('click', function() {
  document.getElementById('color-overlay').style.transform = 'translateX(-0.5px)';
  document.getElementById('background-element').style.backgroundColor = '#333';
  document.getElementById('highlight-overlay').style.opacity = '1';
  document.getElementById('highlight-overlay-mobile').style.opacity = '1';
  document.getElementById('color-name').innerHTML = "BLACK / 050";
  document.getElementById('color-name').style.color = '#333'

})
document.getElementById('color-b').addEventListener('click', function() {
  document.getElementById('color-overlay').style.transform = 'translateX(45px)';
  document.getElementById('background-element').style.backgroundColor = '#457';
  document.getElementById('highlight-overlay').style.opacity = '0';
  document.getElementById('highlight-overlay-mobile').style.opacity = '0';
  document.getElementById('color-name').innerHTML = "BLUES / 2V5";
  document.getElementById('color-name').style.color = '#457'
})
</script>

</body>






<footer class="footer"> <!-- Footer-ul paginii -->
	<div class="container"> <!-- Container pentru conținutul footer-ului -->
	  <div class="footer-content"> <!-- Conținutul footer-ului -->
		<div class="footer-logo"> <!-- Logo-ul footer-ului -->
		  DILEMMA <!-- Textul logo-ului -->
		</div> <!-- Sfârșitul divului pentru logo-ul footer-ului -->
		<div class="footer-links"> <!-- Link-uri în footer -->
		  <ul class="footer-menu"> <!-- Meniu pentru link-urile footer-ului -->
			<li><a href="http://localhost:3000/index.php">Home</a></li> <!-- Link către pagina de acasă -->
			<li><a href="http://localhost:3000/shop.php">Shop</a></li> <!-- Link către pagina Despre noi -->
			<li><a href="http://localhost:3000/contact.php">Contact</a></li> <!-- Link către pagina de Contact -->
		  </ul> <!-- Sfârșitul listei pentru meniul footer-ului -->
		</div> <!-- Sfârșitul divului pentru link-urile footer-ului -->
		<div class="footer-social"> <!-- Secțiunea pentru link-uri sociale în footer -->
		  <ul class="social-icons"> <!-- Iconițe pentru rețelele sociale -->
			<li><a href="https://www.facebook.com/DilemmaShopOnline/"><i class="fab fa-facebook-f"></i></a></li> <!-- Iconiță Facebook -->
			<li><a href="https://www.instagram.com/dilemma_shop_/"><i class="fab fa-instagram"></i></a></li> <!-- Iconiță Instagram -->
            <li><a href="https://api.whatsapp.com/send/?phone=0760602884&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a></li> <!-- Iconiță W -->
		  </ul> <!-- Sfârșitul listei pentru iconițele sociale -->
		</div> <!-- Sfârșitul divului pentru secțiunea de link-uri sociale -->
	  </div> <!-- Sfârșitul divului pentru conținutul footer-ului -->
	  <div class="footer-bottom"> <!-- Secțiunea de jos a footer-ului -->
		<p>&copy; 2024 DILEMMASHOP. All rights reserved.</p> <!-- Text de drepturi de autor -->
	  </div> <!-- Sfârșitul divului pentru secțiunea de jos a footer-ului -->
	</div> <!-- Sfârșitul containerului pentru footer -->
	</footer> <!-- Sfârșitul footer-ului -->
	
	
		<script src="js/jquery.min.js"></script> <!-- Includerea bibliotecii jQuery -->
	  <script src="js/popper.js"></script> <!-- Includerea bibliotecii Popper.js -->
	  <script src="js/bootstrap.min.js"></script> <!-- Includerea bibliotecii Bootstrap -->
	  <script src="js/main.js"></script> <!-- Includerea fișierului JavaScript principal -->
	
		</body> <!-- Sfârșitul corpului paginii web -->
	</html> <!-- Sfârșitul documentului HTML -->

