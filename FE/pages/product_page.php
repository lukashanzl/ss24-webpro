<?php
  include_once("./includes/header.php");
?>
<script>
var linkElement = document.createElement("link");
linkElement.rel = "stylesheet";
linkElement.href = "../assets/styleprod.css"; 

document.head.appendChild(linkElement);
</script>

<div class="album py-5 align-items-center bg-body-tertiary">
    <div class="container">
    <header style="padding-bottom:20px">
        <!-- Suchleiste -->
        <input type="text" id="searchBar" placeholder="Nach Marke suchen...">
        <!-- Kategorien Dropdown -->
        <select id="categorySelect">
            <option value="all">Alle Kategorien</option>
            <option value="Staubsauger">Staubsauger</option>
            <option value="Accessoires">Accessoires</option>
            <option value="Langarm">Langarm</option>
            <option value="Kurzarm">Kurzarm</option>
        </select>
    </header>

        <div id="products" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <!-- Produkte -->
        </div>
  </div>

   <!-- Warenkorb -->
   <div id="cart">
        <h2>Warenkorb</h2>
        <div id="cartContent">
            <p>Warenkorb leer</p>
        </div>
        <p>Gesamtpreis: <span id="totalPrice">0.00€</span></p>
    </div>

       <!-- Warenkorb-Symbol -->
    <div id="cart-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
        </svg>
        <span id="cart-count">0</span>
    </div>

<script src="../script/script_products.js"></script>
<?php
include_once("./includes/footer.php");
?>